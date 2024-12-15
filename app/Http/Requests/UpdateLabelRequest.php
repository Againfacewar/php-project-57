<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLabelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $labelId = $this->route('label')->id;
        return [
            'name' => 'required|unique:labels,name,' . $labelId,
            'description' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            "name.unique" => __('hexlet.validation.label.unique')
        ];
    }
}
