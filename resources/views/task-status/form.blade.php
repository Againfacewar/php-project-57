{{ html()->label(__('hexlet.statuses.form.labels.name'), 'name')->class('block font-medium text-sm text-gray-700 dark:text-gray-300') }}
{{ html()->input('text', 'name')->class('block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full') }}
<x-input-error :messages="$errors->get('name')" class="mt-2" />