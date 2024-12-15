@section('title', __('hexlet.labels.title') )
<x-app-layout>
    <x-slot name="title">
        {{ __('hexlet.labels.title') }}
    </x-slot>
    @can('create', \App\Models\Label::class)
    <div class="w-full h-full mb-5 mt-10">
        <a href="{{ route('labels.create') }}" class="rounded-md bg-indigo-600 px-4 py-3 text-xl font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            {{ __('hexlet.labels.actions.create') }}
        </a>
    </div>
    @endcan
    <div class="overflow-x-auto rounded-lg">
        <table class="min-w-full table-auto leading-normal">
            <thead class="bg-gray-800">
                <tr>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">{{ __('hexlet.labels.table.id') }}</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">{{ __('hexlet.labels.table.name') }}</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">{{ __('hexlet.labels.table.description') }}</th>
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">{{ __('hexlet.labels.table.created_at') }}</th>
                    @auth()
                    <th class="px-5 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">{{ __('hexlet.labels.table.actions') }}</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
            @foreach($labels as $label)
                <tr class="border-b border-gray-700">
                    <td class="px-5 text-gray-300 py-5 bg-gray-900 whitespace-no-wrap">{{ $label->id }}</td>
                    <td class="px-5 text-gray-300 py-5 bg-gray-900 whitespace-no-wrap">{{ $label->name }}</td>
                    <td class="px-5 text-gray-300 py-5 bg-gray-900 whitespace-no-wrap">{{ $label->description }}</td>
                    <td class="px-5 text-gray-300 py-5 bg-gray-900 whitespace-no-wrap">{{ $label->created_at->format('d.m.Y') }}</td>
                    @canany(['update', 'delete'], $label)
                        <td class="px-5 py-3 text-left text-xs font-semibold text-gray-300 tracking-wider">
                            <form action="{{ route('labels.destroy', $label) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="mb-3 text-red-600 hover:text-red-900 cursor-pointer" onclick="return confirm({{ __('hexlet.confirm') }});">
                                    {{ __('hexlet.labels.actions.delete') }}
                                </button>
                            </form>
                            <a class="text-blue-500 hover:text-blue-900" href="{{ route('labels.edit', $label) }}">{{ __('hexlet.labels.actions.edit') }}</a>
                        </td>
                    @endcan
                </tr>
            @endforeach

            <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</x-app-layout>