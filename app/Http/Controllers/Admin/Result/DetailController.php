<?php

namespace App\Http\Controllers\Admin\Result;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function __invoke(Test $test)
    {
        $results = Result::join('invite_tests','invite_tests.id','=','results.invite_id')
            ->select('results.*')
            ->where('invite_tests.test_id','=',$test->id)
            ->paginate(20);

        return view('admin.result.details', compact(['test', 'results']));
    }
}
