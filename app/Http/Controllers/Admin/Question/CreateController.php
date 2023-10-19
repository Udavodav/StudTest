<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Type;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(Test $test)
    {
        $types = Type::all();
        return view('admin.question.create', compact(['test', 'types']));
    }
}
