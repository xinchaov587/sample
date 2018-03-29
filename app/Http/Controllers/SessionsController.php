<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    // 用户登录页面渲染
    public function create()
    {
        return view('sessions.create');
    }

    // 用户登录逻辑
    public function store(Request $request)
    {
        // 验证
        $credentials = $this->validate($request, [
            'email' => 'required|max:50|email',
            'password' => 'required'
        ]);

        // 逻辑
        $res = Auth::attempt($credentials, $request->has('remember'));

        // 渲染
        if ($res) {
            session()->flash('success', '登陆成功, 欢迎回来!');
            return redirect()->route('users.show', [Auth::user()]);
        } else {
            session()->flash('danger', '登录失败, 账号或密码错误');
            return redirect()->back();
        }
    }

    // 用户登出
    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出');
        return redirect('login');
    }
}
