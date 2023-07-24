<div class="flex ml-60 p-4 justify-between items-center bg-zinc-800 font-HeliosCond text-white">
    <div class="flex items-center">
        <h1 class="text-2xl ml-4">Административная панель</h1>
        @yield('header-content')
    </div>
    <form action="{{route('cp.logout')}}" method="post">
        @csrf
        <button
            type="submit"
            class="mr-1 bg-gazprom-500 uppercase hover:bg-gazprom-400 py-2 px-6">
            выход
        </button>
    </form>
</div>
