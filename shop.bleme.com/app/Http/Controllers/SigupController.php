<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Shop_Category;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SigupController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',[
            'only' => 'guest',
        ]);
    }

    //注册页面
    public function create(){
        $shops = Shop::all();
       $shop_categorys = Shop_Category::all();
        return view('sigup.create',compact('shop_categorys','shops'));
    }
    public function store(Request $request){
        //查询所有name字段
        $name = DB::table('users')->where('name',$request->name)->first();
        //判断
        if ($name){
            return  redirect()->route('sigup')->with('danger','该用户已经存在');
        }

            try{
                DB::transaction(function () use ($request) {
                    $shop_img = $request->file('shop_img');
                    $path = $shop_img->store('public/shop_images');
                    //添加信息表
                    $shop = Shop::create([
                        'shop_category_id' => $request->shop_category_id,
                        'shop_name' => $request->shop_name,
                        'shop_rating' => 0,
                        'shop_img' => $path,
                        'brand' => $request->brand,
                        'on_time' => $request->on_time,
                        'fengniao' => $request->fengniao,
                        'bao' => $request->bao,
                        'piao' => $request->piao,
                        'zhun' => $request->zhun,
                        'start_send' => $request->start_send,
                        'send_cost' => $request->send_cost,
                        'notice' => '',
                        'discount' => '',
                        'status' => 1
                    ]);

                    $users = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'shop_id' =>$shop->id,
                        'status' => 1,
                        'password' => Hash::make($request->password),
                    ]);
                });
                return redirect()->route('login')->with('success','注册成功,请登录');
            }catch(QueryException $exception){
                return back()->with('danger','注册失败，请重新填写');
            }
        }
}
