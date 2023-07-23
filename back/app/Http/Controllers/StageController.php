<?php

namespace App\Http\Controllers;

use App\Http\Requests\StageRequest;
use App\Models\Stage;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $stages = Stage::all()->sortBy('date_start');

        $currentTime = Carbon::now();

        foreach ($stages as $stage) {
            if ($stage->date_start <= $currentTime and $stage->date_end > $currentTime) {
                $stage->stage_status_id = 1;
            } else {
                $stage->stage_status_id = 2;
            }
            $stage->update();
        }

        return view('admin.stages.index', [
            'stages' => $stages,
        ]);
    }

    public function edit(Stage $stage): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.stages.edit', [
            'stage' => $stage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StageRequest $request, Stage $stage): RedirectResponse
    {
        $data = $request->all();
        $stage->update($data);
        return redirect()->route('cp.stages.index')->with(['success' => true, 'message' => 'Данные об этапе успешно изменены!']);
    }
}
