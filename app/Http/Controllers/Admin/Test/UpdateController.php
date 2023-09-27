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
        //$data['user_id'] = auth()->id();
        $test->update($data);
        return redirect()->route('admin.test.show', $test);
    }
}
