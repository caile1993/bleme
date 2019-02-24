<?php

namespace App\Http\Controllers;


use App\Models\Shop;
use App\Models\Shop_Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
//    //登录认证
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    //
    public function index(Request $request){
        $keyword = $request->keyword;

        if($keyword){
            $shops = Shop::where('name','like',"%$keyword%")->paginate(3);
        }else{
            $shops = Shop::paginate(3);
        }

        return view('shop.index',compact('shops','keyword'));
    }

    public function create(){
        $shop_categorys = Shop_Category::all();
        return view('shop.create',compact('shop_categorys'));
    }
    public function store(Request $request){
            $this->validate($request,[
                'shop_category_id'=>'required',
                'shop_name'=>'required',
                'shop_rating'=>'required',
                'brand'=>'required',
                'on_time'=>'required',
                'fengniao'=>'required',
                'bao'=>'required',
                'piao'=>'required',
                'zhun'=>'required',
                'start_send'=>'required',
                'send_cost'=>'required',
                'notice'=>'required',
                'discount'=>'required',
                'notice'=>'required',
//                'status'=>'required',
                'shop_img'=>'image|max:2048',
            ],[
               'shop_category_id.required'=>'请选择店铺分类',
               'shop_name.required'=>'请填写店铺名称',
               'shop_rating.required'=>'请填写评分',
               'brand.required'=>'请选择是否是品牌',
               'on_time.required'=>'请选择是否准时送达',
               'fengniao.required'=>'请选择是否蜂鸟配送',
               'bao.required'=>'请选择是否保标记',
               'piao.required'=>'请选择是否票标记',
               'zhun.required'=>'请选择是否准标记',
               'start_send.required'=>'请填写起送金额',
               'send_cost.required'=>'请填写配送费',
               'notice.required'=>'请填写店公告',
               'discount.required'=>'请填写优惠信息',
//               'status.required'=>'请选择状态',
               'shop_img.image'=>'图片格式不正确',
               'shop_img.max'=>'图片不能超过2M',
            ]);
            $shop_img = $request->file('shop_img');
           $path = $shop_img->store('public/shop_images');

        $data = [
            'shop_category_id'=>$request->shop_category_id,
            'shop_name'=>$request->shop_name,
            'shop_rating'=>$request->shop_rating,
            'brand'=>$request->brand,
            'on_time'=>$request->on_time,
            'fengniao'=>$request->fengniao,
            'bao'=>$request->bao,
            'piao'=>$request->piao,
            'zhun'=>$request->zhun,
            'start_send'=>$request->start_send,
            'send_cost'=>$request->send_cost,
            'notice'=>$request->notice,
            'discount'=>$request->discount,
//            'status'=>$request->status,
            'shop_img'=>$path,
        ];
            Shop::create($data);

            return redirect()->route('shops.index')->with('success','添加成功');
    }

    public function edit(Shop $shop){
            $shop_categorys = Shop_Category::all();
        return view('shop.edit',compact('shop','shop_categorys'));
    }
    public function update(Request $request,Shop $shop){
        $shop->shop_category_id = $request->shop_category_id;
        $shop->shop_name = $request->shop_name;
        $shop->shop_rating = $request->shop_rating;
        $shop->brand = $request->brand;
        $shop->on_time = $request->on_time;
        $shop->fengniao = $request->fengniao;
        $shop->bao = $request->bao;
        $shop->piao = $request->piao;
        $shop->zhun = $request->zhun;
        $shop->start_send = $request->start_send;
        $shop->send_cost = $request->send_cost;
        $shop->notice = $request->notice;
        $shop->discount = $request->discount;
//        $shop->status = $request->status;
        $shop_img = $request->file('shop_img');
        if($shop_img){//上传图片
            $path = $shop_img->store('public/images');
        }else{//没有上传图片
            $path = '';
        }
        $shop->shop_img = $path;
        $shop->save();
        return redirect()->route('shops.index')->with('success','修改成功');
    }

    public function show(Shop $shop)
    {
//        dd($shop);
        return view('shop.show',compact('shop'));
    }

    public function destroy(Shop $shop){
        $shop->delete();
        return redirect()->route('shops.index')->with('success','删除成功');
    }
    //审核
    public function audit(Shop $shop)
    {
        if ($shop->status==1){
            $shop->status = 0;
            $shop->save();
            return redirect()->route('shops.index')->with('danger','审核未通过');
        }else{
            $shop->status = 1;
            $shop->save();
            return redirect()->route('shops.index')->with('success','审核通过');
        }

    }
        //禁用
    public function forbidden(Shop $shop)
    {
        if($shop->status==1){
            $shop->status = -1;
            $shop->save();
            return redirect()->route('shops.index')->with('danger','此商户已被禁用');
        }else{
            $shop->status = 1;
            $shop->save();
            return redirect()->route('shops.index')->with('success','此商户已启用');
        }
    }

}







