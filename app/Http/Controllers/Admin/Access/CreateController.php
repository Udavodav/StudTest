<?php

namespace App\Http\Controllers\Admin\Access;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Access\StoreRequest;
use App\Models\AccessTest;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        AccessTest::create($data);

        return redirect()->route('admin.access.index', $data['test_id']);
    }
}
