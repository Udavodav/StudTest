<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class IndexAllController extends Controller
{
    public function __invoke()
    {
        $tests = Test::all();
        return view('admin.test.index_all', compact('tests'));
    }
}
