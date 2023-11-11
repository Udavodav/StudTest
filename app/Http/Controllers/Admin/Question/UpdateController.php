<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Question\StoreRequest;
use App\Http\Requests\Admin\Question\UpdateRequest;
use App\Models\Answer;
use App\Models\AnswerEmpty;
use App\Models\AnswerOption;
use App\Models\AnswerOrder;
use App\Models\Question;
use App\Models\Test;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Question $question)
    {
        $data = $request->validated();

        DB::transaction(function () use ($data, $question) {

            if(isset($question['path_image']) && $question['path_image'] != '')
                Storage::disk('public')->delete($question['path_image']);

            if(isset($data['question']['path_image']))
                $data['question']['path_image'] = Storage::disk('public')->put('/images', $data['question']['path_image']);


            //удаление старых вариантов
            $answersId = $question->answers()->pluck('id');
            switch ($question['type_id']){
                case '1':case '2':
                    AnswerOption::destroy($answersId);
                break;

                case '3':
                    AnswerEmpty::destroy($answersId);
                break;

                case '4':case '5':
                    AnswerOrder::destroy($answersId);
                break;
            }

            $question->update($data['question']);
            //добавление новых вариантов
            switch ($data['question']['type_id']){
                case '1':case '2':
                    foreach ($data['answers'] as $value){
                        $value['question_id'] = $question['id'];
                        AnswerOption::create($value);
                    }
                break;

                case '3':
                    $data['empty_answer']['question_id'] = $question['id'];
                    AnswerEmpty::create($data['empty_answer']);
                break;

                case '4':case '5':
                foreach ($data['answers'] as $value){
                    $value['question_id'] = $question['id'];
                    AnswerOrder::create($value);
                }
                break;
            }
        });

        return redirect()->route('admin.test.show', $question['test_id']);
    }
}
