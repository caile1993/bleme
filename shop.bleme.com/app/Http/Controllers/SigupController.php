<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Shop_Category;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SigupController extends Controller
{
    //注册页面
    public function create(){
        $shops = Shop::all();
       $shop_categorys = Shop_Category::all();
        return view('sigup.create',compact('shop_categorys','shops'));
    }
    public function store(Request $request){
        try{
            DB::transaction(function () use ($request) {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'shop_id' => $request->shop_id,
                    'status' => 1,
                    'password' => Hash::make($request->password),
                ]);
                $shop_img = $request->file('shop_img');
                $path = $shop_img->store('public/shop_images');
                //添加信息表
                 Shop::create([
                    'shop_category_id' => $request->shop_category_id,
                    'shop_name' => $request->shop_name,
                    'shop_rating' => $request->shop_rating,
                    'shop_img' => $path,
                    'brand' => $request->brand,
                    'on_time' => $request->on_time,
                    'fengniao' => $request->fengniao,
                    'bao' => $request->bao,
                    'piao' => $request->piao,
                    'zhun' => $request->zhun,
                    'start_send' => $request->start_send,
                    'send_cost' => $request->send_cost,
                    'notice' => $request->notice,
                    'discount' => $request->discount,
                    'status' => 1
                ]);
            });
            return redirect()->route('login')->with('success','注册成功,请登录');
        }catch(QueryException $exception){
            return back()->with('danger','注册失败，请重新填写');
        }
    }
}
