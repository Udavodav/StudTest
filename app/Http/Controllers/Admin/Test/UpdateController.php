<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Test\StoreRequest;
use App\Http\Requests\Admin\Test\UpdateRequest;
use App\Models\Test;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Test $test)
    {
        $data = $request->validated();

        try {
            $test->update($data);
        } catch (\Exception $exception) {
            abort(500);
        }

        return redirect()->route('admin.test.show', $test);
    }
}
