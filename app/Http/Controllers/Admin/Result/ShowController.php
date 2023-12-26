<?php

namespace App\Http\Controllers\Admin\Result;

use App\Http\Controllers\Controller;
use App\Models\InviteTest;
use App\Models\Question;
use App\Models\Result;
use App\Models\ResultQuestion;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function __invoke(Result $result)
    {
        $resultQuestions = ResultQuestion::where('result_id', $result->id)->get();

        return view('admin.result.show', compact(['result', 'resultQuestions']));

    }
}
