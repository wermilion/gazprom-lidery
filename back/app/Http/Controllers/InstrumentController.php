<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstrumentRequest;
use App\Models\Instrument;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{

    public function index()
    {
        $instrument = Instrument::all()->first();

        return view('admin.instruments.index', ['instrument' => $instrument]);
    }

    public function edit(Instrument $instrument)
    {
        return view('admin.instruments.edit', [
            'instrument' => $instrument
        ]);
    }

    public function update(InstrumentRequest $request, Instrument $instrument)
    {
        $data = $request->all();

        $instrument->update($data);
        return redirect()->route('cp.instruments.index')->with(['success' => true, 'message' => 'Данные успешно изменены!']);
    }

}
