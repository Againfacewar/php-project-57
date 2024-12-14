@section('title', __('hexlet.tasks.edit.title') )
<x-app-layout>
    <x-slot name="title">
        {{  __('hexlet.tasks.edit.title') }}
    </x-slot>

    <form action="{{ route('tasks.update', $task) }}" method="POST" class="w-1/4 flex flex-col items-start">
        @csrf
        @method('PATCH')
        <div class="mb-2 w-full">
            <x-input-label for="name" :value="__('hexlet.tasks.form.labels.name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $task->name)"  autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="mb-2 w-full">
            <label for="description" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('hexlet.tasks.form.labels.description') }}</label>
            <textarea name="description" id="description"
                      class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            {{ old('description', $task->description) }}
        </textarea>
        </div>
        <div class="mb-2 w-full">
            <label for="status_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('hexlet.tasks.form.labels.status') }}</label>
            <div class="mt-2 grid grid-cols-1">
                <select id="status_id" name="status_id" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm/6">
                    @foreach(\App\Models\TaskStatus::all() as $status)
                        <option value="{{ $status->id }}"
                                @if($status->id === $task->status_id) selected @elseif(old('status_id') === $status->id) selected @endif
                        >
                            {{ $status->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <x-input-error :messages="$errors->get('status_id')" class="mt-2" />
        </div>

        <div class="mb-2 w-full">
            <label for="assigned_to_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('hexlet.tasks.form.labels.assigned') }}</label>
            <div class="mt-2 grid grid-cols-1">
                <select id="assigned_to_id" name="assigned_to_id" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm/6">
                    @if(!old('assigned_to_id') && !$task->assigned_to_id)
                        <option value="" selected>{{ __('hexlet.tasks.form.placeholders.assigned') }}</option>
                    @endif
                    @foreach(\App\Models\User::all() as $user)
                        <option value="{{  $user->id }}"
                            @if($user->id === $task->assigned_to_id) selected @elseif(old('assigned_to_id') === $user->id) selected @endif
                        >
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="mt-4 rounded-md bg-indigo-600 px-3 py-2 text-xl font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            {{ __('hexlet.buttons.update') }}
        </button>
    </form>
</x-app-layout>