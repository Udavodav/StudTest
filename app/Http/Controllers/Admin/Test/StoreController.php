<?php

namespace App\Http\Controllers\Admin\Test;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Test\StoreRequest;
use App\Models\AccessTest;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        try {
            $testId = DB::transaction(function () use ($data){
                $test = Test::create($data);

                AccessTest::create(
                    ['user_id' => $data['user_id'],
                        'test_id' => $test->id]);
                return $test->id;
            });
            return redirect()->route('admin.test.show', $testId);
        }catch (\Exception $exception){
            abort(500);
        }

    }
}
