<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Test $test)
    {
        try {
            $test->delete();
        } catch (\Exception $exception) {
            abort(500);
        }

        return redirect()->route('admin.test.index_my');
    }
}
