<?php

namespace App\Http\Controllers;



use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    //登录界面只能是游客访问
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    //商户登录
    public function create()
    {

        return view('login.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
        ], [
            'name.required' => '用户名不能为空',
            'password.required' => '密码不能为空',
        ]);
        //用户禁用状态下不能登录
        $status = DB::table('users')->where('status',0)->first();
        if($status){
            return back()->with('danger','此用户被禁用');
        }

        if (Auth::attempt([
            'name' => $request->name,
            'password' => $request->password,
        ], $request->has('remember'))) {
            return redirect()->route('menu_categorys.index')->with('success', '登录成功');
        } else {
            return back()->with('danger', '请填写正确的账号密码');
        }
    }

    //注销
    public function destory()
    {
        Auth::logout();
        return redirect()->route('login')->with('success','你已退出');
        }
}
