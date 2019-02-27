<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswdController extends Controller
{
    //修改密码
    public function create()
    {
        return view('passwd.create');
    }

    public function ChangePassword(Request $request){
//        dd($request->old_password)
                $user = Auth::user();
//               var_dump($user);exit;
               if(!Hash::check($user->password,$request->old_password)){
                    return back()->with('danger','输出的密码有误');
               }

        //如果两次输入不一致，就不能进行修改
        if($request->new_password != $request->new_password_confirmation){
            return back()->with('danger','两次输入不一致');
        }
        $user->update(['password' => Hash::make($request->new_password)]);
        Auth::logout();
        return redirect()->route('login')->with('success','修改成功为了你的安全，请重新登录');

    }
}
