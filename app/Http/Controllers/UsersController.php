<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    // 中间件
    public function __construct()
    {
        // 限制未登录用户访问页面
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store', 'index']
        ]);

        //限制已登录用户访问网页
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }


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

    // 用户资料编辑页-渲染
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    // 用户资料编辑页-逻辑
    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);
        // 验证
        $this->validate($request, [
            'name' => 'required|max:12',
            'password' => 'nullable|confirmed|between:6,12'
        ]);

        // 逻辑
        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        // 渲染
        session()->flash('success', '个人资料更新成功 !');
        return redirect()->route('users.show', $user->id);
    }

    // 用户列表页面-渲染
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    // 删除用户-逻辑
    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '成功删除用户 !');
        return back();
    }
}
