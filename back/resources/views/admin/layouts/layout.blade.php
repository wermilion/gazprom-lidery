<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Лидеры Газпрома') }}</title>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    {{Vite::useBuildDirectory('cp')}}
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    @include('admin.components.header')

    <!-- Page Content -->
    <main class="flex ml-60 font-HeliosCond">
        @include('admin.components.menu')
        <div class="py-12 w-full">
            <div class="sm:px-6 lg:px-8">
                @if (session()->has('success'))
                    <div class="flex justify-end">
                        <div
                            class="w-max bg-teal-100 border-t-4 border-teal-500 text-teal-900 px-4 py-3 shadow-md mb-4"
                            role="alert">
                            <div class="flex">
                                <div class="py-1">
                                    <svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                         xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path
                                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    {{ session()->get('message') }}
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
                <div class="bg-white overflow-hidden shadow-sm p-5">
                    <div class="m-2">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@stack('scripts')
