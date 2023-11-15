<?php

namespace App\Http\Controllers\Client\Test;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $tests = Auth::user()->inviteTests()->get();
        return view('client.test.index', compact('tests'));
    }
}
