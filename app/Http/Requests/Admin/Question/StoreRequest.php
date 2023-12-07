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

    public function prepareForValidation()
    {
        $input = $this->all();
        switch ($input['question']['type_id']){
            case '1':
                foreach ($input['answers'] as $key => $value)
                    $input['answers'][$key]['is_right'] = $input['is_right'] == $key ? 1 : 0;
                break;
            case '2':
                $isExists = false;
                foreach ($input['answers'] as $key => $value) {
                    if (isset($input['answers'][$key]['is_right']))
                        $isExists = true;
                    else
                        $input['answers'][$key]['is_right'] = 0;
                }
                if (!$isExists)
                    unset($input['answers'][0]['is_right']);
                break;
            case '4':
                foreach ($input['answers'] as $key => $value)
                    if(!isset($input['answers'][$key]['option1']))
                        $input['answers'][$key]['option1'] = "$key";
                break;
        }

        unset($input['is_right']);
        $this->replace($input);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'question.text' => 'required|string',
            'question.type_id' => 'required',
            'question.path_image' => 'nullable|image',
            'question.score' => 'required|digits_between:0,1000',
            'question.test_id' => 'required|integer',

            'answers' => 'required_if:question.type_id,1,2,4,5|array',
            'answers.*.text' => 'required_if:question.type_id,1,2|string',
            'answers.*.is_right' => 'required_if:question.type_id,1,2|integer',
            'empty_answer.answer' => 'required_if:question.type_id,3|string',
            'answers.*.option1' => 'required_if:question.type_id,4,5|string',
            'answers.*.option2' => 'required_if:question.type_id,4,5|string',

        ];
    }
}
