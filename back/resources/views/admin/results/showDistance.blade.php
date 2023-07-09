@extends('admin.layouts.layout')
@section('content')
    <div class="flex items-center">
        <h1 class="text-2xl m-2 font-bold">{{$stage->name}}</h1>
        <div>
            <form action="">
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
    <div class="mt-4 flex items-end">
        <span class="m-2 text-lg">Минимальный балл: {{$instrument->min_points}}</span>
        <a class="ml-2 w-max text-white bg-gazprom-500 uppercase hover:bg-gazprom-400 py-2 px-4"
           href="{{route('cp.instruments.edit', $instrument)}}">Изменить</a>
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
                            <button
                                type="button"
                                class="mt-4 inline-block py-2 px-3 bg-gazprom-500 hover:bg-gazprom-400 text-white"
                                data-te-toggle="modal"
                                data-te-target="#ModalCenter"
                                data-te-ripple-init
                                data-te-ripple-color="#0079fa">
                                Вписать балл
                            </button>
                            <div
                                data-te-modal-init
                                class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                id="ModalCenter"
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
                                                Вписать балл
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

                                        <form action="{{route('cp.results.storeDistance', $result)}}" method="post">
                                            @csrf
                                            @if($errors->get('points'))
                                                <div class="ml-4">
                                                    <p class="text-red-600">Поле "Количество баллов" должно быть:</p>
                                                    <ul class="list-disc ml-4">
                                                        @foreach($errors->get('points') as $error)
                                                            <li class="text-red-600">{{$error}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="relative p-4 flex items-center">
                                                <label for="points">Количество баллов: </label>
                                                <input name="points"
                                                       id="points"
                                                       class="text-black w-60 h-max ml-4 border-gray-300 focus:border-gazprom-500 focus:ring-gazprom-500 placeholder-gray-500"
                                                       type="text">
                                            </div>

                                            <div
                                                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                                <button
                                                    type="submit"
                                                    class="inline-block bg-gazprom-500 hover:bg-gazprom-400 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                                    data-te-modal-dismiss
                                                    data-te-ripple-init
                                                    data-te-ripple-color="light">
                                                    Подтвердить
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
