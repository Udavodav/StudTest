<?php

namespace App\Http\Controllers\Client\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Result\StoreRequest;
use App\Models\AnswerEmpty;
use App\Models\AnswerOption;
use App\Models\AnswerOrder;
use App\Models\InviteTest;
use App\Models\Question;
use App\Models\Result;
use App\Models\ResultAnswerEmpty;
use App\Models\ResultAnswerOption;
use App\Models\ResultAnswerOrder;
use App\Models\ResultQuestion;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Monolog\toArray;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data = $this->parsingData($data);

        $results = $this->checkAnswers($data);

        $testResult = DB::transaction(function () use ($data, $results){
            $invite = InviteTest::find($data['invite_id']);
            $invite->update(['count_attempts' => $invite->count_attempts - 1]);
            $testResult = Result::create([
                'invite_id' => $data['invite_id'],
                'percent_of_right' => array_sum($results['score_questions'])/$results['max_count_points'],
                'max_points' => $results['max_count_points']
            ]);
            foreach ($data['questions'] as $question){
                $newQuestion = ResultQuestion::create([
                    'result_id' => $testResult->id,
                    'question_id' => $question['question_id'],
                    'score' => $results['score_questions'][$question['question_id']]
                ]);
                if(!isset($question['answers']))
                    continue;
                foreach ($question['answers'] as $answer) {
                    switch ($question['question_type']){
                        case '1':case '2':
                            ResultAnswerOption::create(['result_question_id' => $newQuestion->id, 'answer_option_id' => $answer['answer_option_id']]);
                            break;
                        case '3':
                            ResultAnswerEmpty::create([
                                'result_question_id' => $newQuestion->id,
                                'text' => $answer == null ? '' : $answer
                            ]);
                            break;
                        case '4':
                            ResultAnswerOrder::create([
                                'result_question_id' => $newQuestion->id,
                                'result_answer_order_option2_id' => $answer['result_answer_order_option2_id'],
                            ]);
                            break;
                        case '5':
                            ResultAnswerOrder::create([
                                'result_question_id' => $newQuestion->id,
                                'result_answer_order_option1_id' => $answer['result_answer_order_option1_id'],
                                'result_answer_order_option2_id' => $answer['result_answer_order_option2_id'],
                            ]);
                            break;
                    }
                }
            }
            return $testResult;
        });

        return redirect()->route('client.result.show', $testResult->id);
    }

    private function parsingData($data){
        foreach ($data['questions'] as $key => $question)
        {
            if(!($question['question_type'] == 4 || ($question['question_type'] == 5)))
                continue;
            foreach ($question['answers'] as $keyAnswer => $answer) {
                    $data['questions'][$key]['answers'][$keyAnswer]['result_answer_order_option2_id'] = AnswerOrder::where([
                        ['question_id', '=', $question['question_id']],
                        ['option2', 'like', $question['question_type'] == 4 ? $question['answers'][$keyAnswer]['option2_text'] : $question['order'][$keyAnswer]['text']],
                    ])->first()->id;

                    unset($data['questions'][$key]['answers'][$keyAnswer]['option2_text']);
            }
            unset($data['questions'][$key]['order']);
        }

        return $data;
    }

    private function checkAnswers($data){
         $results = [
             'max_count_points' => Question::whereIn('id', Arr::pluck($data['questions'], 'question_id'))->sum('score')
         ];

         foreach ($data['questions'] as $question){
             switch ($question['question_type']){
                 case '1':case '2':
                     $count = 0;
                     $ids = AnswerOption::where([
                         ['question_id', $question['question_id']],
                         ['is_right', 1]
                     ])->get()->pluck('id')->toArray();
                     if (isset($question['answers'])){
                         foreach ($question['answers'] as $answer){
                             if (in_array($answer['answer_option_id'], $ids))
                                 $count++;
                             else
                                 $count--;
                         }
                     }
                     $results['score_questions'][$question['question_id']] = $count <= 0 ? 0 :
                         Question::where('id', $question['question_id'])->first()->score/count($ids)*$count;
                     break;
                 case '3':
                     $results['score_questions'][$question['question_id']] =
                         AnswerEmpty::where('question_id', $question['question_id'])->first()->answer == $question['answers']['text'] ?
                             Question::where('id', $question['question_id'])->first()->score : 0;
                     break;
                 case '4':
                     $count = 0;
                     $ids = Arr::pluck($question['answers'], 'result_answer_order_option2_id');
                     sort($ids);
                     foreach ($question['answers'] as $key => $answer)
                         if ($answer['result_answer_order_option2_id'] == $ids[$key])
                             $count++;

                     $results['score_questions'][$question['question_id']] = $count == 0 ? 0 :
                         Question::where('id', $question['question_id'])->first()->score/count($question['answers'])*$count;
                     break;
                 case '5':
                     $count = 0;
                     foreach ($question['answers'] as $answer) {
                         if ($answer['result_answer_order_option1_id'] == $answer['result_answer_order_option2_id'])
                             $count++;
                     }
                     $results['score_questions'][$question['question_id']] = $count == 0 ? 0 :
                         Question::where('id', $question['question_id'])->first()->score/count($question['answers'])*$count;
                     break;
             }
         }

         return $results;

    }

}
