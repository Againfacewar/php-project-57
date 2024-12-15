@section('title', __('hexlet.labels.edit.title'))
<x-app-layout>
    <x-slot name="title">
        {{__('hexlet.labels.edit.title')}}
    </x-slot>

    <form action="{{ route('labels.update', $label) }}" method="POST" class="w-1/4">
        @csrf
        @method('PATCH')
        <div class="w-full mb-2">
            <x-input-label for="name" :value="__('hexlet.labels.form.labels.name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $label->name)" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="mb-2 w-full">
            <label for="description" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('hexlet.labels.form.labels.description') }}</label>
            <textarea name="description" id="description"
                      class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            {{ old('description', $label->description) }}
        </textarea>
        </div>
        <button type="submit" class="mt-4 rounded-md bg-indigo-600 px-3 py-2 text-xl font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            {{ __('hexlet.buttons.update') }}
        </button>
    </form>
</x-app-layout>