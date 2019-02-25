<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //管理员登录
    public function create()
    {
        return view('login.create');
    }
    public function store(Request $request)
    {
        //验证规则
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
        ], [
            'name.required' => '请填写账号',
            'password.required' => '请填写密码',
        ]);

        if (Auth::attempt([
            'name' => $request->name,
            'password' => $request->password,
        ], $request->has('remember'))) {
            return redirect()->route('admins.index')->with('success', '登录成功');
        } else {
            return back()->with('danger', '请填写正确的账号和密码');
        }
    }

        public function destory(){
            Auth::logout();
            return redirect()->route('login')->with('success','退出成功');
        }

}
