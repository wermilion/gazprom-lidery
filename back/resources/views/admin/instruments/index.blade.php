@extends('admin.layouts.layout')
@section('content')
    <div class="flex justify-between items-start">
        <div class="flex items-start">
            <h1 class="text-2xl font-bold">Инструменты</h1>
            <a class="ml-2 w-max mb-4 text-white bg-gazprom-500 uppercase hover:bg-gazprom-400 py-2 px-4"
               href="{{route('cp.instruments.edit', $instrument)}}">Изменить</a>
        </div>
    </div>
    <div class="text-lg">
        <div class="flex justify-between items-start">
            <div class="flex items-start">
                <span><b> Минимальное количество баллов для дистанционного этапа:</b> {{$instrument->min_points}}</span>
            </div>
        </div>

        <div class="flex justify-between items-start">
            <div class="flex items-start">
                <span><b>Описание задачи для этапа "Задача":</b> {{$instrument->task}}</span>
            </div>
        </div>
    </div>

@endsection
