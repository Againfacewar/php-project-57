@section('title', 'Менеджер задач')
<x-app-layout>
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}
{{--    <x-slot name="title">--}}
{{--        Жопа--}}
{{--    </x-slot>--}}
    <div class="py-12">
        <div class="">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-2">
                    <h1 class="text-4xl text-white font-semibold">{{ __('hexlet.home_page.title') }}</h1>
                </div>
                <div class="mb-2">
                    <p class="max-w-2xl mb-6 font-semibold text-gray-300 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-300">
                        {{ __('hexlet.home_page.sub_title') }}
                    </p>
                </div>
                <div>
                    <a href="https://ru.hexlet.io/" target="_blank" class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        {{ __('hexlet.home_page.href') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>