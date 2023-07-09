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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stages = Stage::query()->where('name', '!=', 'Регистрация')->orderBy('date_start', 'ASC')->get();
        return view('admin.results.index', [
            'stages' => $stages,
        ]);
    }

    public function show(Stage $stage, StatusFilter $filter)
    {
        $method = 'show_' . $stage->slug;
        return $this->$method($stage, $filter);
    }

    private function show_anketa_i_videointerviu(Stage $stage, StatusFilter $filter)
    {
        $results = Result::orderBy('result_status_id', 'DESC')->where('stage_id', $stage->id)->filter($filter)->paginate(10);
        $statuses = ResultStatus::all();
        return view('admin.results.show', [
            'stage' => $stage,
            'results' => $results,
            'statuses' => $statuses,
        ]);
    }

    private function show_distancionnyi_etap(Stage $stage, StatusFilter $filter)
    {
        $instrument = Instrument::all()->first();
        $results = Result::orderBy('result_status_id', 'DESC')->where('stage_id', $stage->id)->filter($filter)->paginate(10);
        $statuses = ResultStatus::all();
        return view('admin.results.showDistance', [
            'stage' => $stage,
            'results' => $results,
            'statuses' => $statuses,
            'instrument' => $instrument,
        ]);
    }

    private function show_upravlenciskie_reseniia(Stage $stage, StatusFilter $filter)
    {
        $results = Result::orderBy('result_status_id', 'DESC')->where('stage_id', $stage->id)->filter($filter)->paginate(10);
        $statuses = ResultStatus::all();
        return view('admin.results.show', [
            'stage' => $stage,
            'results' => $results,
            'statuses' => $statuses,
        ]);
    }

    private function show_zadaca(Stage $stage, StatusFilter $filter)
    {
        $results = Result::orderBy('result_status_id', 'DESC')->where('stage_id', $stage->id)->filter($filter)->paginate(10);
        $statuses = ResultStatus::all();
        return view('admin.results.show', [
            'stage' => $stage,
            'results' => $results,
            'statuses' => $statuses,
        ]);
    }

    public function printPdf(Stage $stage, Result $result)
    {
        $pdf_method = 'pdf_' . $stage->slug;
        return $this->$pdf_method($stage, $result);
    }

    private function pdf_anketa_i_videointerviu(Stage $stage, Result $result)
    {
        $user = User::query()->where('id', $result->user_id)->first();
        $pdf = PDF::loadView('admin.pdf.form', ['user' => $user, 'stage' => $stage])->setPaper('a4');

        return $pdf->download($stage->slug . '_' . $user->tabel_number . '.pdf');
    }

    private function pdf_upravlenciskie_reseniia(Stage $stage, Result $result)
    {
        $management = ManagementDecision::query()->where('user_id', $result->user_id)->first();
        $user = User::query()->where('id', $result->user_id)->first();
        $pdf = PDF::loadView('admin.pdf.management_decision', ['management' => $management, 'stage' => $stage, 'user' => $user])->setPaper('a4');

        return $pdf->download($stage->slug . '_' . $user->tabel_number . '.pdf');
    }

    private function pdf_zadaca(Stage $stage, Result $result)
    {
        $instrument = Instrument::all()->first();
        $task = Challenge::query()->where('user_id', $result->user_id)->first();
        $user = User::query()->where('id', $result->user_id)->first();
        $pdf = PDF::loadView('admin.pdf.challenge', ['task' => $task, 'stage' => $stage, 'user' => $user, 'instrument' => $instrument])->setPaper('a4');

        return $pdf->download($stage->slug . '_' . $user->tabel_number . '.pdf');
    }

    public function accept(Result $result)
    {
        $result->result_status_id = 1;
        $result->update();
        return redirect()->back();
    }

    public function reject(Result $result)
    {
        $result->result_status_id = 2;
        $result->update();
        return redirect()->back();
    }

    public function onCheck(Result $result)
    {
        $result->result_status_id = 3;
        $result->update();
        return redirect()->back();
    }

    public function storeDistance(Result $result, DistanceRequest $request)
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
}