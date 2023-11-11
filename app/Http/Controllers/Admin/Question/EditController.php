<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Test;
use App\Models\Type;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Question $question)
    {
        $types = Type::all();
        return view('admin.question.edit', compact(['types', 'question']));
    }
}
