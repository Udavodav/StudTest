<?php

namespace App\Http\Requests\Admin\Question;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
                foreach ($input['answers'] as $key => $value)
                    if(!isset($input['answers'][$key]['is_right']))
                        $input['answers'][$key]['is_right'] = 0;
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

    public function messages()
    {
        return [
            'question.text.required' => 'Обязательное для заполнения поле',
            'question.type_id.required' => 'Обязательное для заполнения поле',
            'question.path_image.image' => 'Загружаемый файл должен быть изображением',
            'question.score.required' => 'Обязательное для заполнения поле',
            'question.score.digits_between' => 'Значение должно быть целым числом от 0 до 1000',
            'answers.required_if' => 'Заполните варианты ответов',
            'answers.*.text.required_if' => 'Заполните варианты ответов',
            'answers.*.is_right.required_if' => 'Отметьте правильные варианты ответа',
            'empty_answer.answer.required_if' => 'Введите ответ на вопрос',
            'answers.*.option1.required_if' => 'Заполните варианты ответов в столбце 1',
            'answers.*.option2.required_if' => 'Заполните варианты ответов в столбце 2',
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
            'question.text' => 'required|string',
            'question.type_id' => 'required',
            'question.path_image' => 'nullable|image',
            'question.score' => 'nullable|digits_between:0,1000',
            'question.test_id' => 'nullable|integer',

            'answers' => 'required_if:question.type_id,1,2,4,5|array',
            'answers.*.text' => 'required_if:question.type_id,1,2|string',
            'answers.*.is_right' => 'required_if:question.type_id,1,2|integer',
            'empty_answer.answer' => 'required_if:question.type_id,3|string',
            'answers.*.option1' => 'required_if:question.type_id,4,5|string',
            'answers.*.option2' => 'required_if:question.type_id,4,5|string',

        ];
    }
}
