<?php

namespace App\Http\Controllers\Client\Result;

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
    public function __invoke(Result $result, $isBack = false)
    {
        $resultQuestions = ResultQuestion::where('result_id', $result->id)->get();

        return view('client.result.show_result', compact(['result', 'resultQuestions', 'isBack']));

    }
}
