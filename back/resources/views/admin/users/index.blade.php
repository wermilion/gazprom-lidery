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
            <tr class="py-2">
                <td class="border-2 border-gazprom-500 px-6 ">{{$user->tabel_number}}</td>
                <td class="border-2 border-gazprom-500 px-6 ">{{$user->name}}</td>
                <td class="border-2 border-gazprom-500 px-6 ">{{$user->surname}}</td>
                <td class="border-2 border-gazprom-500 px-6">{{$user->branch?->name}}</td>
                <td class="border-2 border-gazprom-500 px-6">{{$user->position }}</td>
                <td class="border-2 border-gazprom-500 px-6">{{$user->work_experience }}</td>
                <td class="px-6">
                    <button
                        type="button"
                        class="inline-block"
                        data-te-toggle="modal"
                        data-te-target="#ModalCenter{{$user->id}}"
                        data-te-ripple-init
                        data-te-ripple-color="#0079fa">
                        <img src="{{asset('/images/delete-icon.svg')}}" alt="delete-icon" draggable="false">
                    </button>
                    <div
                        data-te-modal-init
                        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                        id="ModalCenter{{$user->id}}"
                        tabindex="-1"
                        aria-labelledby="exampleModalCenterTitle"
                        aria-modal="true"
                        role="dialog">
                        <div
                            data-te-modal-dialog-ref
                            class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
                            <div
                                class="pointer-events-auto relative flex w-full flex-col border-none dark:bg-zinc-800 text-current text-white shadow-lg outline-none">
                                <div
                                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                    <!--Modal title-->
                                    <h5
                                        class="text-xl font-medium leading-normal">
                                        Удаление
                                    </h5>
                                    <!--Close button-->
                                    <button
                                        type="button"
                                        class="box-content border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                        data-te-modal-dismiss
                                        aria-label="Close">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="h-6 w-6">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>

                                <!--Modal body-->
                                <div class="relative p-4">
                                    <p>Вы уверены, что хотите удалить конкурсанта?</p>
                                </div>

                                <!--Modal footer-->
                                <div
                                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                    <button
                                        type="button"
                                        class="inline-block bg-gazprom-500 hover:bg-gazprom-400 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                        data-te-modal-dismiss
                                        data-te-ripple-init
                                        data-te-ripple-color="light">
                                        Нет
                                    </button>
                                    <form action="{{route('cp.users.destroy', $user)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="ml-1 inline-block bg-gazprom-500 hover:bg-gazprom-400 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                            data-te-ripple-init
                                            data-te-ripple-color="light">
                                            Да
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="mt-4">
        {{ $users->links() }}
    </div>
@endsection

