@extends('admin.layouts.layout')
@section('content')
    <div class="flex justify-between items-start">
        <div class="flex flex-col">
            <a class="w-max mb-4 text-white bg-gazprom-500 uppercase hover:bg-gazprom-400 py-2 px-4"
               href="{{route('cp.branches.create')}}">Добавить филилал</a>
            <h1 class="text-2xl font-bold">Список филиалов</h1>
        </div>
    </div>
    <ul class="mt-4 list-decimal">
        @foreach($branches as $branch)
            <li class="ml-4 text-lg">
                <div class="flex justify-between items-center">
                    {{$branch->name}}
                    <div class="flex ml-4">
                        <a class="mr-4" href="{{ route('cp.branches.edit', $branch) }}">
                            <img src="{{URL('/images/edit-pen.svg')}}" alt="edit">
                        </a>
                        <form action="{{route('cp.branches.destroy', $branch)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button>
                                <img src="{{URL('/images/delete-icon.svg')}}" alt="delete-icon">
                            </button>
                        </form>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
