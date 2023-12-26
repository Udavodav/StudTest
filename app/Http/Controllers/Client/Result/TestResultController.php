<?php

namespace App\Http\Controllers\Client\Result;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestResultController extends Controller
{
    public function __invoke(Test $test)
    {
        $results = Result::join('invite_tests','invite_tests.id','=','results.invite_id')
            ->select('results.*')
            ->where([
                ['invite_tests.user_id','=',Auth::user()->id],
                ['invite_tests.test_id','=',$test->id]
            ])
            ->paginate(15);

        return view('client.result.details', compact(['test', 'results']));
    }
}
