<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-param" content="_token" />

        <title>@yield('title', 'Hexlet Менеджер задач')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')
        <div class="wrapper max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flash flex flex-col gap-2 pt-12">
                @foreach(session('flash_notification', collect())->toArray() as $message)
                    <div class="p-4 font-bold text-sm rounded-lg @if($message['level'] === 'success') text-green-700 bg-green-100 @else text-red-700 bg-red-100 @endif" style="width: max-content">
                        {!! $message['message'] !!}
                    </div>
                @endforeach
            </div>
            <!-- Page Heading -->
            @isset($title)
                <div class="text-5xl text-white my-5">
                    {{ $title }}
                </div>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        </div>
    </body>
</html>
