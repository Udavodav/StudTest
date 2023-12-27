<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Question $question)
    {

        return view('admin.question.show', compact('question'));
    }
}
