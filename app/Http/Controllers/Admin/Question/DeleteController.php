<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Test;
use App\Models\Type;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Question $question)
    {
        try {
            $question->delete();
        } catch (\Exception $exception) {
            abort(500);
        }

        return redirect()->route('admin.test.show', $question->test_id);
    }
}
