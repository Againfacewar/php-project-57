@section('title', $task->name)
<x-app-layout>
    <div class="mb-5 text-3xl text-white">
        {{ __('hexlet.tasks.show.title') }} <span class="text-2xl text-gray-400">{{ $task->name }}</span>
    </div>
    <div class="content flex flex-col gap-2 mb-5">
        <div class="text-white font-bold">{{ __('hexlet.tasks.show.fields.name') }} <span
                    class="text-gray-400">{{ $task->name }}</span></div>
        <div class="text-white font-bold">{{ __('hexlet.tasks.show.fields.status') }} <span
                    class="text-gray-400">{{ $task->status->name }}</span></div>
        @if($task->description)
            <div class="text-white font-bold">{{ __('hexlet.tasks.show.fields.description') }} <span
                        class="text-gray-400">{{ $task->description }}</span></div>
        @endif

    </div>
    <div class="text-white font-bold mb-1">
        {{ __('hexlet.tasks.show.fields.labels') }}
    </div>
    <div class="flex gap-2 mb-8">
        @foreach($task->labels as $label)
            <span class="bg-indigo-100 text-gray-200 text-xs font-medium px-3.5 py-1.5 rounded-full dark:bg-indigo-900 dark:text-indigo-300/10/10/20">{{ $label->name }}</span>
        @endforeach
    </div>
    <div class="">
        @can('update', $task)
            <a class="rounded-md bg-indigo-600 px-4 py-3 text-xl font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
               href="{{ route('tasks.edit', $task) }}">{{ __('hexlet.tasks.actions.edit') }}</a>
        @endcan
    </div>
</x-app-layout>