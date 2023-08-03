<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Лидеры Газпрома</title>
    <link rel="shortcut icon" href="{{asset('cp/images/favicon.ico')}}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    {{Vite::useBuildDirectory('cp')}}
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 text-gazprom-600 font-bold text-3xl flex flex-col items-center justify-center">
    <img src="{{asset('cp/images/404.svg')}}" alt="404" draggable="false">
    @if($exception->getMessage() == 'Выставите даты для этапа')
        <p class="mt-12 uppercase">
            {{ $exception->getMessage() }}. перейти на страницу с
            <a class="text-gazprom-500" href="{{route('cp.stages.index')}}">этапами</a>
        </p>
    @else
        <p class="mt-12 uppercase">
            что-то пошло не так. вернуться
            <a class="text-gazprom-500" href="{{route('cp.index')}}">на главный экран</a>
        </p>
    @endif
</div>
</body>
</html>







