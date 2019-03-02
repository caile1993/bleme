<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //登录认证
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(Request $request){
        $keyword = $request->keyword;

        if($keyword){
            $users = User::where('name','like',"%$keyword%")->paginate(3);
        }else{
            $users =  User::paginate(3);
        }
        return view('user.index',compact('users','keyword'));
    }


    public function create(){
        $shops = Shop::all();
        return view('user.create',compact('shops'));
    }

    public function store(Request $request){
            $this->validate($request,[
                'name'=> 'required',
                'email'=> 'required',
                'password'=> 'required',
                'status'=> 'required',
                'shop_id'=> 'required',
            ],[
                'name.required'=>'名称不能为空',
                'email.required'=>'邮箱不能为空',
                'password.required'=>'密码不能为空',
                'shop_id.required'=>'所属商家不能为空',
            ]);

            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'status'=>$request->status,
                'shop_id'=>$request->shop_id,
            ]);

            return redirect()->route('users.index')->with('success','添加成功');
    }
        //状态
    public function status(User $user){
        if($user->status){
            $user->status = 0;
            $user->save();
            return back()->with('danger','账号禁用成功');
        }else {
            $user->status = 1;
            $user->save();
            return back()->with('success', '账号启用成功');
        }

    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', '删除成功');
    }


}
