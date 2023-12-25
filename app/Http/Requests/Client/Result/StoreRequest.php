<?php

namespace App\Http\Requests\Client\Result;

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
            'invite_id' => 'required|integer',
            'questions.*.question_id' => 'required|integer',
            'questions.*.question_type' => 'required|integer',
            'questions.*.answers' => 'array',
            'questions.*.order' => 'array',
            'questions.*.answers.*.answer_option_id' => 'integer',
            'questions.*.answers.text' => 'nullable|string',
            'questions.*.answers.*.result_answer_order_option1_id' => 'integer',
            'questions.*.answers.*.option2_text' => 'nullable|string',
        ];
    }
}
