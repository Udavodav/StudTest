<?php

namespace App\Http\Requests\Admin\Question;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'text' => 'required|string',
            'type_id' => 'required',
            'path_image' => 'nullable|file',
            'answer' => 'nullable|string',
            'score' => 'nullable|numeric',
            'textOp.*' => 'required|string',
            'path_imageOp.*' => 'nullable|string',
            'is_right.*' => 'required|integer',
        ];
    }
}
