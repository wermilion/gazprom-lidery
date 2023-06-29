<nav
    class="fixed left-0 top-0 z-10 h-full w-60 -translate-x-full
    overflow-hidden bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)]
    data-[te-sidenav-hidden='false']:translate-x-0 dark:bg-zinc-800"
    data-te-sidenav-init
    data-te-sidenav-hidden="false"
    data-te-sidenav-position="inline-block"
    data-te-sidenav-accordion="true">
    <a
        class="mb-3 flex items-center justify-center border-b-2 border-solid border-gray-100 py-6 outline-none font-bold text-blue-700"
        href="{{route('cp.index')}}"
        data-te-ripple-init
        data-te-ripple-color="primary">
        <img
            class="mr-2 w-3/5"
            src="{{URL('/images/gazprom-logo.svg')}}"
            alt="Gazprom Tomsk"
            draggable="false"/>
    </a>
    <ul class="relative m-0 list-none px-[0.2rem] pb-12" data-te-sidenav-menu-ref>
        <li class="relative pt-4">
            <span class="px-6 py-4 text-[0.6rem] font-['HeliosCond'] uppercase text-gray-600 dark:text-gray-400 ">навигационная панель</span>
            <a href="{{route('cp.users.index')}}"
               class="flex cursor-pointer items-center truncate rounded-[5px] px-6 py-[0.45rem] text-[0.85rem] text-gray-600 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
               data-te-sidenav-link-ref>
                <span class="text-lg">Пользователи</span>
            </a>
        </li>
        <li class="relative">
            <a href="{{route('cp.stages.index')}}"
               class="flex cursor-pointer items-center truncate rounded-[5px] px-6 py-[0.45rem] text-[0.85rem] text-gray-600 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
               data-te-sidenav-link-ref>
                <span class="text-lg">Этапы</span>
            </a>
        </li>
        <li class="relative">
            <a {{--href="{{route()}}"--}}
               class="flex cursor-pointer items-center truncate rounded-[5px] px-6 py-[0.45rem] text-[0.85rem] text-gray-600 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
               data-te-sidenav-link-ref>
                <span class="text-lg">Результаты</span>
            </a>
        </li>
        <li class="relative">
            <a href="{{route('cp.branches.index')}}"
               class="flex cursor-pointer items-center truncate rounded-[5px] px-6 py-[0.45rem] text-[0.85rem] text-gray-600 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
               data-te-sidenav-link-ref>
                <span class="text-lg">Филиалы</span>
            </a>
        </li>
    </ul>
</nav>
