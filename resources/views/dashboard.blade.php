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
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center">
                    <h1 class="text-2xl text-white font-semibold">{{ __('hexlet.navigation.logo') }}</h1>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>