@section('title', __('hexlet.statuses.title'))
<x-app-layout>
    <x-slot name="title">
        {{ __('hexlet.statuses.actions.create') }}
    </x-slot>

    <form action="{{ route('task_statuses.store') }}" method="POST" class="w-1/4">
        @csrf
        <x-input-label for="name" :value="__('hexlet.statuses.form.labels.name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
        <button type="submit" class="mt-4 rounded-md bg-indigo-600 px-3 py-2 text-xl font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            {{ __('hexlet.buttons.create') }}
        </button>
    </form>
</x-app-layout>