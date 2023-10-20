<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Question\StoreRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Test;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        dd($data);
        $dataQuestion = $data;
        unset($dataQuestion['is_rightOnce']);
        unset($dataQuestion['textOnce']);
        unset($dataQuestion['path_imageOnce']);
        if($dataQuestion['path_image'])
            $dataQuestion['path_image'] = Storage::put('/images', $dataQuestion['path_image']);
        $question = Question::create($dataQuestion);

        foreach ($data['textOnce'] as $key => $value){
            $answer['question_id'] = $question['id'];
            $answer['text'] = $value;
            $answer['is_right'] = (int)($data['is_rightOnce'][0]) == $key ? 1 : 0;
            Answer::create($answer);
        }

        return 'Store controller question!';
    }
}
