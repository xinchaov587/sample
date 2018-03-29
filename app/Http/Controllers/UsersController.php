<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    // 注册页面渲染
    public function create()
    {
        return view('users.create');
    }

    // 用户信息也渲染
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // 用户注册逻辑
    public function store(Request $request)
    {
        // 检测
        $this->validate($request, [
            'name' => 'required|max:12',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|between:6,12|confirmed'
        ]);

        // 逻辑
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // 渲染
        Auth::login($user);
        session()->flash('success', '恭喜您! 账号注册成功!');
        return redirect()->route('users.show', [$user]);
    }
}
