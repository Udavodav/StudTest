<?php

namespace App\Http\Controllers\Client\Test;

use App\Http\Controllers\Controller;
use App\Models\InviteTest;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    public function __invoke(Test $test)
    {
        $invite = InviteTest::where([
                    ['test_id', '=', $test->id],
                    ['user_id', '=',  auth()->user()->id],
                    ['count_attempts', '>',  0]
                ])->first();
        return view('client.test.show', compact(['test', 'invite']));
    }
}
