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
{{--            <form class="w-full h-full flex justify-between" action="{{ route('tasks.index') }}" method="GET">--}}
{{--                @csrf--}}
{{--                <div class="flex gap-2 w-3/4">--}}
{{--                    <select id="filter[status_id]" name="filter[status_id]" class="cursor-pointer w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm/6">--}}
{{--                        <option value="" @if(!isset($filter['status_id'])) selected @endif>{{ __('hexlet.tasks.form.placeholders.filters.status') }}</option>--}}
{{--                        @foreach($statuses as $status)--}}
{{--                            <option value="{{  $status->id }}" @if(isset($filter['status_id']) && $filter['status_id'] == $status->id) selected @endif>--}}
{{--                                {{ $status->name }}--}}
{{--                            </option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                    <select id="filter[created_by_id]" name="filter[created_by_id]" class="cursor-pointer w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm/6">--}}
{{--                        <option value="" @if(!isset($filter['created_by_id'])) selected @endif>{{ __('hexlet.tasks.form.placeholders.filters.author') }}</option>=--}}
{{--                        @foreach($users as $user)--}}
{{--                            <option value="{{ $user->id }}" @if(isset($filter['created_by_id']) && $filter['created_by_id'] == $user->id) selected @endif>--}}
{{--                                {{ $user->name }}--}}
{{--                            </option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                    <select id="filter[assigned_to_id]" name="filter[assigned_to_id]" class="cursor-pointer w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm/6">--}}
{{--                        <option value="" @if(!isset($filter['assigned_to_id'])) selected @endif>{{ __('hexlet.tasks.form.placeholders.filters.assigned') }}</option>--}}
{{--                        @foreach($users as $user)--}}
{{--                            <option value="{{ $user->id }}" @if(isset($filter['assigned_to_id']) && $filter['assigned_to_id'] == $user->id) selected @endif>--}}
{{--                                {{ $user->name }}--}}
{{--                            </option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="flex items-center">--}}
{{--                    <button type="submit"--}}
{{--                            class="rounded-md bg-indigo-600 px-4 py-3 text-xl font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"--}}
{{--                    >--}}
{{--                        {{ __('hexlet.buttons.apply') }}--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </form>--}}
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