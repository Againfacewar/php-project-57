<?php

namespace App\Http\Requests;

use App\Models\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;

class TaskStatusUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        /** @var TaskStatus $status */
        $status = $this->route('task_status');
        $statusId = $status->id;
        return [
            'name' => 'required|max:16|unique:task_statuses,name,' . $statusId
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
