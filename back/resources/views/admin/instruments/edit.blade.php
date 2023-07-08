@extends('admin.layouts.layout')
@section('content')
    <form method="post" action="{{ route('cp.instruments.update', $instrument) }}">
        @csrf
        @method('PUT')
        <div>
            @if($errors->get('min_points'))
                <p class="text-red-600">Поле "Минимальное количество баллов" должно быть:</p>
                <ul class="list-disc ml-4">
                    @foreach($errors->get('min_points') as $error)
                        <li class="text-red-600">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            <label class="block font-medium text-lg text-gray-700" for="min_points">
                Минимальное количество баллов
            </label>
            <input
                placeholder="Мин. количество баллов"
                class="border-gray-300 focus:border-gazprom-500 focus:ring-gazprom-500 shadow-sm block mt-1"
                id="min_points" type="text" name="min_points" autofocus="autofocus"
                value="{{ old('min_points', $instrument->min_points) }}">
        </div>

        <div>
            @if($errors->get('task'))
                <p class="text-red-600">Поле "Задача" должно быть:</p>
                <ul class="list-disc ml-4">
                    @foreach($errors->get('task') as $error)
                        <li class="text-red-600">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            <label class="block font-medium text-lg text-gray-700" for="task">
                Задача
            </label>
            <textarea
                class="w-full border-gray-300 focus:border-gazprom-500 focus:ring-gazprom-500 shadow-sm block mt-1"
                placeholder="Описание задачи"
                id="task" name="task">{{ old('task', $instrument->task) }}</textarea>
        </div>

        <button
            type="submit"
            class="mt-4 bg-gazprom-500 uppercase hover:bg-gazprom-400 font-HeliosCond py-2 px-3 text-white disabled:opacity-25">
            Изменить
        </button>
    </form>
@endsection
