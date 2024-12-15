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
        $statusId = $this->route('task_status')->id;
        return [
            'name' => 'required|unique:task_statuses,name,' . $statusId
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' =>__('hexlet.validation.status.unique')
        ];
    }
}
