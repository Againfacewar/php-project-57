{{ html()->form('GET', route('tasks.index'))->class('w-full h-full flex justify-between')->open() }}
<div class="flex gap-2 w-3/4">
    {{ html()->select('filter[status_id]', ['' => 'Статус'] + $statuses->pluck('name', 'id')->toArray(), $filter['status_id'] ?? null)->class('cursor-pointer w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm') }}
    {{ html()->select('filter[created_by_id]', ['' => 'Автор'] + $users->pluck('name', 'id')->toArray(), $filter['created_by_id'] ?? null)->class('cursor-pointer w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm') }}
    {{ html()->select('filter[assigned_to_id]', ['' => 'Исполнитель'] + $users->pluck('name', 'id')->toArray(), $filter['assigned_to_id'] ?? null)->class('cursor-pointer w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm') }}
</div>
<div class="flex items-center">
    {{ html()->submit(__('hexlet.buttons.apply'))->class('rounded-md bg-indigo-600 px-4 py-3 text-xl font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600') }}
</div>
{{ html()->form()->close() }}