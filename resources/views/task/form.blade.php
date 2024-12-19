<div class="mb-2 w-full">
    {{ html()->label(__('hexlet.tasks.form.labels.name'), 'name')->class('block font-medium text-sm text-gray-700 dark:text-gray-300') }}
    {{ html()->input('text', 'name')->class('border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full') }}
    <x-input-error :messages="$errors->get('name')" class="mt-2" />
</div>

<div class="mb-2 w-full">
    {{ html()->label(__('hexlet.tasks.form.labels.description'), 'description')->class('block font-medium text-sm text-gray-700 dark:text-gray-300') }}
    {{ html()->textarea('description')->class('w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm')  }}
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>

<div class="mb-2 w-full">
    {{ html()->label(__('hexlet.tasks.form.labels.status'), 'status_id')->class('block font-medium text-sm text-gray-700 dark:text-gray-300') }}
    <div class="mt-2 grid grid-cols-1">
        {{ html()->select('status_id', ['' => ''] + $statuses->pluck('name', 'id')->toArray())
    ->class('w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm') }}
    </div>
    <x-input-error :messages="$errors->get('status_id')" class="mt-2"/>
</div>

<div class="mb-2 w-full">
    {{ html()->label( __('hexlet.tasks.form.placeholders.assigned') , 'assigned_to_id')->class('block text-gray-700 mb-3') }}
    <div class="mt-2 grid grid-cols-1">
        {{ html()->select('assigned_to_id', ['' => ''] + $users->pluck('name', 'id')->toArray())
   ->class('w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm') }}
    </div>
    <x-input-error :messages="$errors->get('status_id')" class="mt-2"/>
</div>

@if($labels->count() > 0)
    <div class="mb-2 w-full">
        {{ html()->label( __('hexlet.tasks.form.labels.labels') , 'assigned_to_id')->class('block text-gray-700 mb-3') }}
        <div class="mt-2 grid grid-cols-1">
            {{ html()->select('labels', $labels->pluck('name', 'id')->toArray())->multiple()
       ->class('w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm') }}
        </div>
        <x-input-error :messages="$errors->get('status_id')" class="mt-2"/>
    </div>
@endif


