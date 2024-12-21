@section('title', __('hexlet.tasks.title'))
<x-app-layout>
    <x-slot name="title">
        {{ __('hexlet.tasks.title') }}
    </x-slot>
    <div class="w-full h-full mb-5 mt-10">
        @can('create', \App\Models\Task::class)
            <a href="{{ route('tasks.create') }}" class="rounded-md bg-indigo-600 px-4 py-3 text-xl font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                {{ __('hexlet.tasks.actions.create') }}
            </a>
        @endcan
    </div>
        <div class="w-full h-full mb-3">
                @include('task.filter-form')
        </div>

    <div class="overflow-x-auto rounded-lg">
        <table class="min-w-full table-auto leading-normal">
            <thead class="bg-gray-800">
            <tr>
                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">{{ __('hexlet.tasks.table.id') }}</th>
                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">{{ __('hexlet.tasks.table.status') }}</th>
                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">{{ __('hexlet.tasks.table.name') }}</th>
                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">{{ __('hexlet.tasks.table.author') }}</th>
                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">{{ __('hexlet.tasks.table.assigned') }}</th>
                <th class="px-5 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">{{ __('hexlet.tasks.table.created_at') }}</th>
                @auth()
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">{{ __('hexlet.statuses.table.head.actions') }}</th>
                @endauth
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr class="border-b border-gray-700">
                    <td class="px-5 text-gray-300 py-5 bg-gray-900 whitespace-no-wrap">{{ $task->id }}</td>
                    <td class="px-5 text-gray-300 py-5 bg-gray-900 whitespace-no-wrap">{{ $task->status->name }}</td>
                    <td class="px-5 text-gray-300 py-5 bg-gray-900 whitespace-no-wrap"><a class="text-blue-500 hover:text-blue-900" href="{{ route('tasks.show', $task) }}">{{ $task->name }}</a></td>
                    <td class="px-5 text-gray-300 py-5 bg-gray-900 whitespace-no-wrap">{{ $task->creator->name }}</td>
                    <td class="px-5 text-gray-300 py-5 bg-gray-900 whitespace-no-wrap">{{ $task->assignedUser?->name }}</td>
                    <td class="px-5 text-gray-300 py-5 bg-gray-900 whitespace-no-wrap">{{ $task->created_at->format('d.m.Y') }}</td>
                    <td class="px-5 py-3 text-left text-xs font-semibold text-gray-300 tracking-wider">
                        @can('delete', $task)
                        <a class="mb-3 text-red-600 hover:text-red-900 cursor-pointer"
                           rel="nofollow"
                           data-method="delete"
                           data-confirm="{{ __('hexlet.confirm') }}"
                           href="{{ route('tasks.destroy', $task) }}"
                        >
                            {{ __('hexlet.statuses.actions.delete') }}
                        </a>
                        @endcan
                        @can('update', $task)
                            <a class="text-blue-500 hover:text-blue-900" href="{{ route('tasks.edit', $task) }}">{{ __('hexlet.statuses.actions.edit') }}</a>
                        @endcan
                    </td>
                </tr>
            @endforeach

            <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
    <div class="pb-12 mt-4">
        {{ $tasks->links() }}
    </div>
</x-app-layout>