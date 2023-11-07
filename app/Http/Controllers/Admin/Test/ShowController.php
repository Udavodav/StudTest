<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Test $test)
    {
        $questions = Question::where('test_id', $test->id)->get();

        return view('admin.test.show', compact(['test', 'questions']));
    }
}
