<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Menu_Category;
use App\Models\Shop;
use App\Models\Shop_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     }
    //添加
    public function create()
    {
       $menu_categorys = Menu_Category::all();
        return view('menu.create', compact('menu_categorys'));
    }

    public function store(Request $request)
    {
        //处理图片
        $goods_img = $request->file('goods_img');
        $path = $goods_img->store('public/goods_images');

        Menu::create([
            'goods_name'=>$request->goods_name,
            'rating'=>$request->rating,
            'shop_id'=>Auth::user()->shop_id,
            'category_id'=>$request->category_id,
            'goods_price'=>$request->goods_price,
            'description'=>$request->description,
            'month_sales'=>$request->month_sales,
            'rating_count'=>$request->rating_count,
            'tips'=>$request->tips,
            'satisfy_count'=>$request->satisfy_count,
            'satisfy_rate'=>$request->satisfy_rate,
            'goods_img'=>$path,
            'status'=>$request->status,
        ]);
        return redirect()->route('menus.index')->with('success','添加成功');
   }
        public function index(Request $request){
                $min_price = $request->min_price;
                $max_price = $request->max_price;
                $keyword = $request->keyword;
            $wheres = [];
            if($keyword) $wheres[]=['goods_name','like',"%$keyword%"];
            if($min_price) $wheres[] = ['goods_price','>=',$min_price];
            if($max_price) $wheres[] = ['goods_price','<=',$max_price];
            $menus = Menu::where($wheres)->get();
            return view('menu.index',compact('menus','keyword'));
        }

        public function edit(Menu $menu){
            $menu_categorys = Menu_Category::all();
            return view('menu.edit',compact('menu','menu_categorys'));
        }

        public function update(Menu $menu,Request $request)
         {

             $goods_img = $request->file('goods_img');
             if($goods_img){//上传图片
                 $path = $goods_img->store('public/goods_images');
             }else{//没有上传图片
                 $path = '';
             }
             $menu->goods_img = $path;
             $menu->goods_name = $request->goods_name;
             $menu->rating = $request->rating;
             $menu->goods_name = $request->goods_name;
             $menu->category_id = $request->category_id;
             $menu->goods_price = $request->goods_price;
             $menu->description = $request->description;
             $menu->month_sales = $request->month_sales;
             $menu->rating_count = $request->rating_count;
             $menu->tips = $request->tips;
             $menu->satisfy_count = $request->satisfy_count;
             $menu->satisfy_rate = $request->satisfy_rate;
             $menu->tips = $request->tips;
             $menu->save();
             return redirect()->route('menus.index')->with('success','修改成功');
         }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success','删除成功');
    }

    public function set(Menu $menu){
        if($menu->status){
            $menu->status=0;
            $menu->save();
            return redirect()->route('menus.index')->with('success','下架成功');
        }else{
            $menu->status = 1;
            $menu->save();
            return redirect()->route('menus.index')->with('success','上架成功');
        }

    }
}
