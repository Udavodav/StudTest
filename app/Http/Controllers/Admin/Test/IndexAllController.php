<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexAllController extends Controller
{
    public function __invoke()
    {
        $tests = Auth::user()->accessTests()->get();
        return view('admin.test.index_all', compact('tests'));
    }
}
