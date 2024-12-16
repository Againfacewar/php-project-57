@section('title', __('hexlet.labels.edit.title'))
<x-app-layout>
    <x-slot name="title">
        {{__('hexlet.labels.edit.title')}}
    </x-slot>
    {{ html()->modelForm($label, 'PATCH', route('labels.update', $label))->class('w-1/4 flex flex-col items-start')->open() }}
    @include('label.form')
    {{ html()->submit(__('hexlet.buttons.update'))->class('mt-4 rounded-md bg-indigo-600 px-3 py-2 text-xl font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600') }}
    {{ html()->closeModelForm() }}
</x-app-layout>