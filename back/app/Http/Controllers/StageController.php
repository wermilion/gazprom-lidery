<?php

namespace App\Http\Controllers;

use App\Http\Requests\StageRequest;
use App\Models\Stage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stages = Stage::all()->sortBy('date_start');

        $currentTime = Carbon::now();

        foreach ($stages as $stage) {
            $stage->date_start <= $currentTime && $currentTime < $stage->date_end ? $stage->stage_status_id = 1 : $stage->stage_status_id = 2;
            $stage->update();
        }

        return view('admin.stages.index', [
            'stages' => $stages,
        ]);
    }

    public function edit(Stage $stage)
    {
        return view('admin.stages.edit', [
            'stage' => $stage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StageRequest $request, Stage $stage)
    {
        $data = $request->all();
        $stage->update($data);
        return redirect()->route('cp.stages.index')->with(['success' => true, 'message' => 'Данные об этапе успешно изменены!']);
    }
}
