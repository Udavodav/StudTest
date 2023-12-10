<?php

namespace App\Http\Controllers\Client\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke(Test $test)
    {
        if(!session('question_ids'))
        {
            $questions = Question::where('test_id', $test->id)
                ->inRandomOrder()
                //->orderBy(DB::raw('RAND()'))
                //->with(['answers' => function($query){ $query->inRandomOrder(); }])
                ->limit($test->count_questions)
                ->get();
            $questions->load(['answers' => function($query){ $query->inRandomOrder(); }]);
        }

        dd($questions);
        return view('client.question.index', compact(['test','questions']));
    }
}
