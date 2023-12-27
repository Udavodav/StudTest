<?php

namespace App\Http\Controllers\Client\Result;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $tests = Auth::user()->resultTests()->paginate(20);
        return view('client.result.index_result', compact('tests'));
    }
}
