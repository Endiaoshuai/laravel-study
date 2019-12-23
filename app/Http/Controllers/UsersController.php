<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    // show 方法声明类型 Eloquent 模型 User
    public function show(User $user)
    {
        // dump($user);
        // 通过 compact 方法转化为一个关联数组
        return view('users.show', compact('user'));
    }

    public function store(Request $request)
    {
        // 数据校验， 由 App\Http\Controllers\Controller 类中的 ValidatesRequests 进行定义
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
        Auth::login($user);
        var_dump(Auth::login($user), $user); die();
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
        dump(session()->get('success'));
        // 等同于 redirect()->route('users.show', [$user->id]);
        return redirect()->route('users.show', [$user]); // route方法会自动获取Model的主键   
    }

    // 利用了 Laravel 的『隐性路由模型绑定』功能，直接读取对应 ID 的用户实例 $user
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'password'=> 'required|confirmed|min:6'
        ]);
        
        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        session()->flash('success', '个人资料更新成功！');
        return redirect()->route('users.show', $user->id);
    }
}
