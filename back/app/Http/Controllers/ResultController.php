<?php

namespace App\Http\Controllers;

use App\Http\Filters\StatusFilter;
use App\Http\Requests\DistanceRequest;
use App\Models\Challenge;
use App\Models\Instrument;
use App\Models\ManagementDecision;
use App\Models\Result;
use App\Models\ResultStatus;
use App\Models\Stage;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ResultController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $stages = Stage::query()->where('name', '!=', 'Регистрация')->orderBy('date_start')->get();
        $currentTime = Carbon::now();

        foreach ($stages as $stage) {
            if ($stage->date_start <= $currentTime and $stage->date_end > $currentTime) {
                $stage->stage_status_id = 1;
            } else {
                $stage->stage_status_id = 2;
            }
            $stage->update();
        }
        return view('admin.results.index', [
            'stages' => $stages,
        ]);
    }

    public function show(Stage $stage, StatusFilter $filter): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $results = Result::query()->orderBy('result_status_id', 'DESC')->where('stage_id', $stage->id)->filter($filter)->paginate(10);
        $statuses = ResultStatus::all();

        switch ($stage->name) {
            case 'Дистанционный этап':
                $this->createResult($stage);
                $results = Result::query()->orderBy('result_status_id', 'DESC')->where('stage_id', $stage->id)->filter($filter)->paginate(10);
                $instrument = Instrument::all()->first();
                return view('admin.results.showDistance', [
                    'stage' => $stage,
                    'results' => $results,
                    'statuses' => $statuses,
                    'instrument' => $instrument
                ]);
            case 'Очный этап' || 'Финал':
                $this->createResult($stage);
                $results = Result::query()->orderBy('result_status_id', 'DESC')->where('stage_id', $stage->id)->filter($filter)->paginate(10);
                return view('admin.results.show', [
                    'stage' => $stage,
                    'results' => $results,
                    'statuses' => $statuses,
                ]);
        }

        return view('admin.results.show', [
            'stage' => $stage,
            'results' => $results,
            'statuses' => $statuses,
        ]);
    }

    public function printPdf(Stage $stage, Result $result): Response
    {
        return match ($stage->name) {
            'Анкета и видеоинтервью' => $this->pdfQuestionnaireAndVideoInterview($stage, $result),
            'Управленческие решения' => $this->pdfManagementDecisions($stage, $result),
            'Задача' => $this->pdfTask($stage, $result),
        };
    }

    private function pdfQuestionnaireAndVideoInterview(Stage $stage, Result $result): Response
    {
        $user = User::query()->where('id', $result->user_id)->first();
        $pdf = PDF::loadView('admin.pdf.form', ['user' => $user, 'stage' => $stage])->setPaper('a4');

        return $pdf->download($stage->slug . '_' . $user->tabel_number . '.pdf');
    }

    private function pdfManagementDecisions(Stage $stage, Result $result): Response
    {
        $management = ManagementDecision::query()->where('user_id', $result->user_id)->first();
        $user = User::query()->where('id', $result->user_id)->first();
        $pdf = PDF::loadView('admin.pdf.management_decision', ['management' => $management, 'stage' => $stage, 'user' => $user])->setPaper('a4');

        return $pdf->download($stage->slug . '_' . $user->tabel_number . '.pdf');
    }

    private function pdfTask(Stage $stage, Result $result): Response
    {
        $instrument = Instrument::all()->first();
        $task = Challenge::query()->where('user_id', $result->user_id)->first();
        $user = User::query()->where('id', $result->user_id)->first();
        $pdf = PDF::loadView('admin.pdf.challenge', ['task' => $task, 'stage' => $stage, 'user' => $user, 'instrument' => $instrument])->setPaper('a4');

        return $pdf->download($stage->slug . '_' . $user->tabel_number . '.pdf');
    }

    public function accept(Result $result): RedirectResponse
    {
        $result->result_status_id = 1;
        $result->update();
        return redirect()->back();
    }

    public function reject(Result $result): RedirectResponse
    {
        $result->result_status_id = 2;
        $result->update();
        return redirect()->back();
    }

    public function onCheck(Result $result): RedirectResponse
    {
        $result->result_status_id = 3;
        $result->update();
        return redirect()->back();
    }

    public function storeDistance(Result $result, DistanceRequest $request): RedirectResponse
    {
        $instrument = Instrument::all()->first();

        if ($request->points < $instrument->min_points) {
            $result->result_status_id = 2;
        } else {
            $result->result_status_id = 1;
        }
        $result->update();

        return redirect()->route('cp.results.show', $result->stage->slug);
    }

    private function createResult(Stage $stage): void
    {
        if (Carbon::now() > $stage->date_end) {
            $prev_stage = Stage::query()->where('date_end', '<', $stage->date_start)->orderBy('date_end', 'desc')->first();
            $prev_results = Result::query()->where('stage_id', '=', $prev_stage->id)->where('result_status_id', '=', 1)->get();
            foreach ($prev_results as $prev_result) {
                if (!Result::query()->where('user_id', $prev_result->user_id)->where('stage_id', $stage->id)->exists()) {
                    Result::create([
                        'stage_id' => $stage->id,
                        'user_id' => $prev_result->user_id,
                        'result_status_id' => 3
                    ]);
                }
            }
        }
    }
}
