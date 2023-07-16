@extends('admin.layouts.layout')
@section('content')
    <div class="flex flex-col">
        <ul class="stage-list">
            @foreach($stages as $stage)
                <li class="stage-item">
                    <div class="flex flex-col m-2 bg-gray-100 shadow-md">
                        <div class="m-3">
                            <div class="flex justify-between">
                                <h1 class="font-bold text-2xl">{{$stage->name}}</h1>
                            </div>
                            <div class="mt-4">
                                <span>Статус по времени: </span>
                                <span
                                    class="@if($stage->stage_status->status_name == 'Доступно') text-green-600 @else text-red-600 @endif">
                                    {{$stage->stage_status->status_name}}
                                </span>
                            </div>
                            <div class="w-max mt-4">
                                <a href="{{route('cp.results.show', $stage)}}"
                                   class="trigger hover:bg-gazprom-500 hover:text-white">Посмотреть результаты
                                </a>
                            </div>
                            <div class="flex justify-end">
                                <span>{{\Carbon\Carbon::parse($stage->date_start)->translatedFormat("F j, H:i")}} - {{\Carbon\Carbon::parse($stage->date_end)->translatedFormat("F j, H:i")}} (по Томску)</span>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
