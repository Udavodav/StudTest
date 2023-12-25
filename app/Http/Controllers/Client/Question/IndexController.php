<?php

namespace App\Http\Controllers\Client\Question;

use App\Http\Controllers\Controller;
use App\Models\InviteTest;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke(Test $test, InviteTest $invite)
    {
        if($invite->count_attempts <= 0)
            return redirect()->route('client.test.index');

        $questions = Question::where('test_id', $test->id)
            ->orderBy(DB::raw('RAND()'))
            ->limit($test->count_questions)
            ->get();


        return view('client.question.index', compact(['test', 'questions', 'invite']));
    }
}
