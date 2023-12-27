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
