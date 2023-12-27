<?php

namespace App\Http\Controllers\Admin\Invite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Invite\StoreRequest;
use App\Models\AccessTest;
use App\Models\InviteTest;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        try {
            DB::transaction(function () use ($data){
                foreach ($data['users'] as $user){
                    InviteTest::create([
                        'user_id' => $user,
                        'test_id' => $data['test_id'],
                        'is_can_view' => isset($data['is_can_view']) ? 1 : 0,
                        'count_attempts' => $data['count_attempts'],
                        'count_minutes' => $data['count_minutes']
                    ]);
                }
            });
        }catch (\Exception $exception){
            abort(500);
        }

        return redirect()->route('admin.test.index_all');
    }
}
