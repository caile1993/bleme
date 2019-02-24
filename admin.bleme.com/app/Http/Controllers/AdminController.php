<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
//    //登录认证
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    //首页
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        if($keyword){
            $admins = Admin::where('name','like',"%$keyword%")->paginate(3);
        }else{
            $admins =  Admin::paginate(3);
        }
        return view('admin.index',compact('admins','keyword'));
    }

    public function create(){
        return view('admin.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ],[
            'name.required'=>'姓名不能为空',
            'email.required'=>'邮箱不能为空',
            'password.required'=>'密码不能为空',
        ]);

        Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->route('admins.index')->with('success','添加成功');

    }
    public function destroy(Admin $admin){
        $admin->delete();
        return redirect()->route('admins.index')->with('success','删除成功');
    }
    public function edit(Admin $admin){
        return view('admin.edit',compact('admin'));
    }

    public function update(Admin $admin,Request $request){
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->save();
        return redirect()->route('admins.index')->with('success','修改成功');

    }
}
