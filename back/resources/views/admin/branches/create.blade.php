@extends('admin.layouts.layout')
@section('content')
    <form method="post" action="{{ route('cp.branches.store') }}">
        @csrf
        <div>
            @if($errors->get('name'))
                <p class="text-red-600">Поле "Название филиала" должно быть:</p>
                <ul class="list-disc ml-4">
                    @foreach($errors->get('name') as $error)
                        <li class="text-red-600">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            <label class="block font-medium text-lg text-gray-700" for="name">
                Название филиала
            </label>
            <input
                class="border-gray-300 focus:border-gazprom-500 focus:ring-gazprom-500 shadow-sm block mt-1"
                id="name" type="text" name="name" autofocus="autofocus" required
                value="{{ old('name') }}">
        </div>

        <button
            type="submit"
            class="mt-4 bg-gazprom-500 uppercase hover:bg-gazprom-400 font-HeliosCond py-2 px-3 text-white disabled:opacity-25">
            Создать
        </button>

    </form>
@endsection
