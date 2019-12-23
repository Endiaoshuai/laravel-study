<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    // show 方法声明类型 Eloquent 模型 User
    public function show(User $user)
    {
        // 通过 compact 方法转化为一个关联数组
        // var_dump(compact('user'));
        return view('users.show', compact('user'));
    }
}
