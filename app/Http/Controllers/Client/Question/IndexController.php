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
    public function __invoke(Test $test, Question $question = null)
    {
        if(!session('question_ids'))
        {
            $questions = Question::where('test_id', $test->id)
                ->orderBy(DB::raw('RAND()'))->get()->pluck('id');
            session()->put('question_ids', $questions);
        }

        dd(session('question_ids'));
        return view('client.question.index', compact('tests'));
    }
}
