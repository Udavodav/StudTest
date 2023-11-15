<?php

namespace App\Http\Controllers\Client\Test;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $tests = Test::all();
        return view('client.test.index', compact('tests'));
    }
}
