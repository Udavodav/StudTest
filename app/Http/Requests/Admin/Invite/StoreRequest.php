<?php

namespace App\Http\Requests\Admin\Invite;

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

    public function messages()
    {
        return [
            'count_attempts.required' => 'Обязательное для заполнения поле',
            'count_attempts.integer' => 'Значение должно быть целым числом',
            'count_minutes.required' => 'Обязательное для заполнения поле',
            'count_minutes.integer' => 'Значение должно быть целым числом',
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'is_can_view' => 'nullable|integer',
            'count_attempts' => 'required|integer',
            'count_minutes' => 'required|integer',
            'test_id' => 'required|integer',
            'users' => 'required|array',

        ];
    }
}
