<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Question\StoreRequest;
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

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        DB::transaction(function () use ($data) {

            if(isset($data['question']['path_image']))
                $data['question']['path_image'] = Storage::put('/images', $data['question']['path_image']);
            $question = Question::create($data['question']);

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

        return redirect()->route('admin.test.show', $data['question']['test_id']);
    }
}
