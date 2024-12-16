<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStatusUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        $taskStatus = $this->route('task_status');
        $statusId = is_object($taskStatus) ? $taskStatus->id : null;

        return [
            'name' => 'required|unique:task_statuses,name,' . $statusId
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => __('hexlet.validation.status.unique'),
            'name.required' => 'Это обязательное поле',
        ];
    }
}
