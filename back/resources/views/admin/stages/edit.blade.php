@extends('admin.layouts.layout')
@section('content')
    <form method="post" action="{{ route('cp.stages.update', $stage) }}">
        @csrf
        @method('PUT')
        <div>
            @if($errors->get('name'))
                <p class="text-red-600">Поле "Название этапа" должно быть:</p>
                <ul class="list-disc ml-4">
                    @foreach($errors->get('name') as $error)
                        <li class="text-red-600">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            <label class="block font-medium text-lg text-gray-700" for="name">
                Название этапа
            </label>
            <input
                placeholder="Название этапа"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm block mt-1"
                id="name" type="text" name="name" autofocus="autofocus"
                value="{{ old('name', $stage->name) }}">
        </div>

        <div class="mt-4">
            @if($errors->get('instruction'))
                <p class="text-red-600">Поле "Инструкция" должно быть:</p>
                <ul class="list-disc ml-4">
                    @foreach($errors->get('instruction') as $error)
                        <li class="text-red-600">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            <label class="block font-medium text-lg text-gray-700" for="instruction">
                Инструкция этапа
            </label>
            <textarea
                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm block mt-1"
                placeholder="Инструкция"
                id="instruction" name="instruction">
                {{ old('instruction', $stage->instruction) }}
            </textarea>
        </div>
        <div class="flex mt-4">
            <div class="mr-4">
                @if($errors->get('date_start'))
                    <p class="text-red-600">Поле "Дата начала" должно быть:</p>
                    <ul class="list-disc ml-4">
                        @foreach($errors->get('date_start') as $error)
                            <li class="text-red-600">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                <label class="block font-medium text-lg text-gray-700" for="date_start">
                    Дата начала
                </label>
                <input name="date_start" id="date_start"
                       class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm block mt-1"
                       type="datetime-local" value="{{old('date_start', $stage->date_start)}}">
            </div>
            <div>
                @if($errors->get('date_end'))
                    <p class="text-red-600">Поле "Дата конца" должно быть:</p>
                    <ul class="list-disc ml-4">
                        @foreach($errors->get('date_end') as $error)
                            <li class="text-red-600">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                <label class="block font-medium text-lg text-gray-700" for="date_end">
                    Дата конца
                </label>
                <input name="date_end" id="date_end"
                       class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm block mt-1"
                       type="datetime-local" value="{{old('date_end', $stage->date_end)}}">
            </div>
        </div>
        <div class="mt-4">
            <label for="activity">Вкл/выкл</label>
            <input
                hidden
                value="0" name="activity">
            <input
                @checked(old('activity', $stage->activity))
                value="1"
                id="activity" type="checkbox" name="activity">
        </div>
        <button
            type="submit"
            class="mt-4 bg-gazprom-500 uppercase hover:bg-gazprom-400 py-2 px-3 text-white disabled:opacity-25">
            Изменить
        </button>
    </form>
@endsection