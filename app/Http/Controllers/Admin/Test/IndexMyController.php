<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class IndexMyController extends Controller
{
    public function __invoke()
    {
        $tests = Test::where('user_id', auth()->id())->get();
        return view('admin.test.index_my', compact('tests'));
    }
}
