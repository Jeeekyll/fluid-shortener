<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $data = [
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ];

        User::query()->create($data);
        return redirect($request->original_link);
    }
}
