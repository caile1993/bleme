<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function create(){
        return view('passwd.create');
    }

    public function ChangePassword(Request $request){

        $this->validate($request,[
            'old_password' => 'required',
            'new_password' => 'required',
            'new_password_confirmation' => 'required',
        ],[
            'old_password.required' => '旧密码不能为空',
            'new_password.required' => '新密码不能为空',
            'new_password_confirmation.required' => '确认密码不能为空',
        ]);

        $admin = Auth::user();
            if(!Hash::check($request->old_password,$admin->password)){
                return back()->with('danger','旧密码不正确');
            }

            if($request->new_password != $request->new_password_confirmation){
                    return back()->with('danger','两次输入的密码不一致');
            }
            $admin->update(['password' =>Hash::make($request->new_password)]);
            Auth::logout();
            return redirect()->route('login')->with('success','修改成功，请重新登录');

    }
}
