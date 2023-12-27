<?php

namespace App\Http\Controllers\Admin\Access;

use App\Http\Controllers\Controller;
use App\Models\AccessTest;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(Test $test)
    {
        $users = User::where('is_admin', 'like', 1)
            ->whereNotIn('id', AccessTest::where('test_id', '=', $test->id)->pluck('user_id')->toArray())
            ->paginate(10);

        return view('admin.access.index', compact(['test', 'users']));
    }
}
