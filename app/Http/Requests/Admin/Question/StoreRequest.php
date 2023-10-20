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
        dd($input);
        $suffix = '';

        if($input['type_id'] == '1')
            $suffix = 'Once';
        elseif ($input['type_id'] == '2')
            $suffix = 'Many';

        if(isset($input['is_rightMany']) || $input['type_id'] == '1'){
            foreach ($input['is_right'.$suffix] as $item){
                foreach ($input['answers'.$suffix] as $key => $answer) {
                    $input['answers'][$key]['is_right'] = (int)$item === $key ? 1 : 0;
                }
            }
        }


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
            'text' => 'required|string',
            'type_id' => 'required',
            'path_image' => 'nullable|image',
            'answer' => 'nullable|string',
            'score' => 'nullable|numeric',
//            'textOnce.*' => 'required_if:type_id,1|string',
//            //'path_imageOnce.*' => 'nullable|string',
//            'is_rightOnce.*' => 'required_if:type_id,1|string',

            'answers' => 'required|array',
            'answers.*.text' => 'required|string',
            'answers.*.is_right' => 'required|integer',
            'is_right.*' => 'required|array',

//            'textMany.*' => 'required_if:type_id,2|string',
//            //'path_imageMany.*' => 'nullable|string',
//            'is_rightMany.*' => 'required|present|string',
        ];
    }
}
