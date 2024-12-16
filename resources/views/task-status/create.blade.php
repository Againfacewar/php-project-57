@section('title', __('hexlet.statuses.create.title'))
<x-app-layout>
    <x-slot name="title">
        {{ __('hexlet.statuses.actions.create') }}
    </x-slot>
    {{ html()->modelForm($status, 'POST', route('task_statuses.store'))->class('w-1/4 flex flex-col items-start')->open() }}
        @include('task-status.form')
    {{ html()->submit(__('hexlet.buttons.create'))->class('mt-4 rounded-md bg-indigo-600 px-3 py-2 text-xl font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600') }}
    {{ html()->closeModelForm() }}
</x-app-layout>