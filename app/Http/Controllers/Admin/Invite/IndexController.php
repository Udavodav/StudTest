<?php

namespace App\Http\Controllers\Admin\Invite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Invite\FilterRequest;
use App\Models\AccessTest;
use App\Models\Group;
use App\Models\InviteTest;
use App\Models\Test;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request, Test $test)
    {
//        $query = User::where('is_admin', 'like', 0)
//            ->whereNotIn('id', InviteTest::where([
//                    ['test_id', '=', $test->id],
//                    ['count_attempts', '<>', 0]
//                ])->pluck('user_id')->toArray())
//            ->paginate(30);
        $data = $request->validated();
        $query = User::query()
            ->where('is_admin', 'like', 0)
            ->whereNotIn('id', InviteTest::where([
                ['test_id', '=', $test->id],
                ['count_attempts', '<>', 0]
            ])->pluck('user_id')->toArray());

        if(isset($data['group_id']) && $data['group_id'] >= 0)
            $query->whereIn('id', UserGroup::where('group_id', '=', $data['group_id'])->pluck('user_id')->toArray());

        $groups = Group::all();
        $users = $query->paginate(30);

        return view('admin.invite.index', compact(['test', 'users', 'groups', 'data']));
    }
}
