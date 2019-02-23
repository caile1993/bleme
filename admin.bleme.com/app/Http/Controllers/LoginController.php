<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //登录界面只能是游客访问
    public function __construct()
    {
        $this->middleware('guest',[
            'only' => ['create']
        ]);
    }
    //登录界面
    public function create(){
        return view('login.create');
    }
    public function store(Request $request)
    {
        //登录验证规则
        $this->validate($request,[
            'name' => 'required',
            'password' => 'required',
        ],[
            'name.required' => '请填写账号',
            'password.required' => '请填写密码',
        ]);
        //登录验证
        if(Auth::attempt([
           'name' => $request->name,
           'password' => $request->password,
       ],$request->has('remember'))){
            return redirect()->route('users.index')->with('success','欢迎你,登录成功');
       }else{
            return back()->with('danger','请填写正确的账号和密码');
       }
    }
     //注销
    public function destory(){
        Auth::logout();
        return redirect()->route('login')->with('success','成功退出');
    }

}
