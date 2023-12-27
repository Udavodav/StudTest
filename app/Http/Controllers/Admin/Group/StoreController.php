<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Group\StoreRequest;
use App\Models\AccessTest;
use App\Models\Group;
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
            Group::create($data);
            return redirect()->route('admin.group.index');
        }catch (\Exception $exception){
            abort(500);
        }

    }
}
