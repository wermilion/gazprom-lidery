@extends('admin.layouts.layout')
@section('content')
    <div class="flex items-center">
        <h1 class="text-2xl m-2 font-bold">{{$stage->name}}</h1>
        <div>
            <form action="" method="get">
                <input
                    placeholder="Поиск по табельному номеру"
                    class="w-60 h-max ml-4 border-gray-300 focus:border-gazprom-500 focus:ring-gazprom-500 placeholder-gray-500"
                    type="text" name="tabel_number"
                    value="{{ old('tabel_number', request()->get('tabel_number')) }}">
                <select name="result_status_id" id="status"
                        class="w-max h-max ml-4 border-gray-300 focus:border-gazprom-500 focus:ring-gazprom-500">
                    <option selected value="0" class="text-gray-600">Выберите статус</option>
                    @foreach($statuses as $status)
                        <option
                            @selected(old('result_status_id', request()->get('result_status_id')) == $status->id) value="{{$status->id}}">{{$status->status_name}}</option>
                    @endforeach
                </select>
                <button
                    class="w-max h-max ml-2 text-white bg-gazprom-500 uppercase hover:bg-gazprom-400 py-2 px-4">
                    Поиск
                </button>
            </form>

        </div>
    </div>

    <div class="flex flex-col">
        <ul class="stage-list">
            @foreach($results as $result)
                <li class="stage-item">
                    <div class="flex flex-col m-2 bg-gray-100 shadow-md">
                        <div class="m-3">
                            <div class="flex justify-between">
                                <span class="font-bold text-xl">Табельный номер: {{$result->user->tabel_number}}</span>
                            </div>
                            <div class="mt-4">
                                <span>Статус результата: </span>
                                <span class="@if($result->status->status_name == 'На проверке') text-amber-500
                                             @elseif($result->status->status_name == 'Пройдено') text-green-500
                                             @else text-red-500 @endif">
                                    {{$result->status->status_name}}</span>
                            </div>
                            <div class="flex items-center mt-4">
                                @if($result->status->status_name == 'На проверке')
                                    <form action="{{route('cp.results.accept', $result)}}" method="post">
                                        @csrf
                                        <button
                                            class="w-max bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2">
                                            Принять
                                        </button>
                                    </form>
                                    <form class="ml-4" action="{{route('cp.results.reject', $result)}}" method="post">
                                        @csrf
                                        <button
                                            class="w-max bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2">
                                            Отклонить
                                        </button>
                                    </form>
                                @elseif($result->status->status_name == 'Отклонено')
                                    <form action="{{route('cp.results.onCheck', $result)}}" method="post">
                                        @csrf
                                        <button
                                            class="w-max bg-amber-500 hover:bg-amber-700 text-white font-bold py-2 px-2">
                                            Отправить на проверку
                                        </button>
                                    </form>
                                    <form class="ml-4" action="{{route('cp.results.accept', $result)}}" method="post">
                                        @csrf
                                        <button
                                            class="w-max bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2">
                                            Принять
                                        </button>
                                    </form>
                                @else
                                    <form action="{{route('cp.results.onCheck', $result)}}" method="post">
                                        @csrf
                                        <button
                                            class="w-max bg-amber-500 hover:bg-amber-700 text-white font-bold py-2 px-2">
                                            Отправить на проверку
                                        </button>
                                    </form>
                                    <form class="ml-4" action="{{route('cp.results.reject', $result)}}" method="post">
                                        @csrf
                                        <button
                                            class="w-max bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2">
                                            Отклонить
                                        </button>
                                    </form>
                                @endif
                                <a href="{{route('cp.results.printPdf', [$stage, $result])}}"
                                   class="w-max trigger hover:bg-gazprom-500 hover:text-white ml-4">
                                    Экспорт
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="mt-4">
            {{ $results->links() }}
        </div>
    </div>
@endsection
