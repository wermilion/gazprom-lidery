@extends('admin.layouts.layout')
@section('content')
    <div class="flex justify-between items-start">
        <div class="flex flex-col">
            <a class="w-max mb-4 text-white bg-gazprom-500 uppercase hover:bg-gazprom-400 py-2 px-4"
               href="{{route('cp.users.create')}}">Создать конкурсанта</a>
            @if($errors->get('tabel_number'))
                <div class="mb-4">
                    @foreach($errors->get('tabel_number') as $error)
                        <span class="text-red-600">{{$error}}</span>
                    @endforeach
                </div>
            @endif
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">Список конкурсантов</h1>
                <form action="{{route('cp.users.index')}}"
                      method="get">
                    <input
                        placeholder="Поиск по табельному номеру"
                        class="w-60 h-max ml-4 border-gray-300 focus:border-gazprom-500 focus:ring-gazprom-500 placeholder-gray-500"
                        type="text" name="tabel_number"
                        value="{{ old('tabel_number', request()->get('tabel_number')) }}">
                    <select name="branch_id"
                            class="w-max h-max ml-4 border-gray-300 focus:border-gazprom-500 focus:ring-gazprom-500">
                        <option selected value="0" class="text-gray-500">Выберите филиал</option>
                        @foreach($branches as $branch)
                            <option
                                @selected(old('branch_id', request()->get('branch_id')) == $branch->id)  value="{{$branch->id}}">{{$branch->name}}</option>
                        @endforeach
                    </select>
                    <button
                        class="w-max h-max ml-2 text-white bg-gazprom-500 uppercase hover:bg-gazprom-400 py-2 px-4">
                        Поиск
                    </button>
                </form>
                <a class="w-max ml-2 text-white bg-gazprom-500 uppercase hover:bg-gazprom-400 py-2 px-4"
                   href="{{route('cp.users.index')}}">Сбросить фильтры</a>
                <a class="w-max ml-2 text-white bg-gazprom-500 uppercase hover:bg-gazprom-400 py-2 px-4"
                   href="{{route('cp.users.export', [
                        'tabel_number' => request()->get('tabel_number'),
                        'branch_id' => request()->get('branch_id'),
                        ])}}">
                    Экспорт</a>
            </div>
        </div>
    </div>

    <table class="mt-2 w-full whitespace-no-wrap-full whitespace-no-wrap">
        <thead>
        <tr class="text-center font-bold bg-gazprom-500 text-white">
            <td class="border-2 border-gazprom-500 px-6 py-3">Табельный номер</td>
            <td class="border-2 border-gazprom-500 px-6 py-3">Имя</td>
            <td class="border-2 border-gazprom-500 px-6 py-3">Фамилия</td>
            <td class="border-2 border-gazprom-500 px-6 py-3">Филиал</td>
            <td class="border-2 border-gazprom-500 px-6 py-3">Должность</td>
            <td class="border-2 border-gazprom-500 px-6 py-3">Опыт работы</td>
        </tr>
        </thead>
        @foreach($users as $user)
            <tr class="py-2 leading-[2.15]">
                <td class="border-2 border-gazprom-500 px-6 ">{{$user->tabel_number}}</td>
                <td class="border-2 border-gazprom-500 px-6 ">{{$user->name}}</td>
                <td class="border-2 border-gazprom-500 px-6 ">{{$user->surname}}</td>
                <td class="border-2 border-gazprom-500 px-6">{{$user->branch?->name}}</td>
                <td class="border-2 border-gazprom-500 px-6">{{$user->position }}</td>
                <td class="border-2 border-gazprom-500 px-6">{{$user->work_experience }}</td>
            </tr>
        @endforeach
    </table>
    <div class="mt-4">
        {{ $users->links() }}
    </div>
@endsection

