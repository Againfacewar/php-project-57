@section('title', 'Статусы')
<x-app-layout>
    <x-slot name="title">
        {{ __('hexlet.statuses.title') }}
    </x-slot>
    @can('create', \App\Models\TaskStatus::class)
    <div class="w-full h-full my-5">
        <a href="{{ route('task_statuses.create') }}" class="rounded-md bg-indigo-600 px-4 py-3 text-xl font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            {{ __('hexlet.statuses.actions.create') }}
        </a>
    </div>
    @endcan
    <div class="overflow-x-auto rounded-lg">
        <table class="min-w-full table-auto leading-normal">
            <thead class="bg-gray-800">
                <tr>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">{{ __('hexlet.statuses.table.head.id') }}</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">{{ __('hexlet.statuses.table.head.name') }}</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">{{ __('hexlet.statuses.table.head.created_at') }}</th>
                    @auth()
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">{{ __('hexlet.statuses.table.head.actions') }}</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
            @foreach($statuses as $status)
                <tr class="border-b border-gray-700">
                    <td class="px-5 text-gray-300 py-5 bg-gray-900 whitespace-no-wrap">{{ $status->id }}</td>
                    <td class="px-5 text-gray-300 py-5 bg-gray-900 whitespace-no-wrap">{{ $status->name }}</td>
                    <td class="px-5 text-gray-300 py-5 bg-gray-900 whitespace-no-wrap">{{ $status->created_at->format('d.m.Y') }}</td>
                    @canany(['update', 'delete'], $status)
                        <td class="px-5 py-3 text-left text-xs font-semibold text-gray-300 tracking-wider">
                            <form action="{{ route('task_statuses.destroy', $status) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="mb-3 text-red-600 hover:text-red-900 cursor-pointer" onclick="return confirm('Вы уверены, что хотите удалить этот элемент?');">
                                    {{ __('hexlet.statuses.actions.delete') }}
                                </button>
                            </form>
                            <a class="text-blue-500 hover:text-blue-900" href="{{ route('task_statuses.edit', $status) }}">{{ __('hexlet.statuses.actions.edit') }}</a>
                        </td>
                    @endcan
                </tr>
            @endforeach

            <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</x-app-layout>