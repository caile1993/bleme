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
       $menu_categorys = Menu_Category::where('shop_id','=',Auth::user()->shop_id)->get();
        return view('menu.create', compact('menu_categorys'));
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'goods_name'=>'required',
            'category_id'=>'required',
            'goods_price'=>'required',
            'status'=>'required',
            'goods_img'=>'image|max:2048',
        ],[
            'goods_name.required' => '请填写名称',
            'category_id.required' => '请选择一个分类',
            'goods_price.required' => '请填写价格',
            'status.required' => '请选择是否上架',
            'goods_img.image' => '图片格式不正确',
        ]);


        //处理图片
        $goods_img = $request->file('goods_img');
        $path = $goods_img->store(date('Ymd'));
          $data = [
                'goods_name'=>$request->goods_name,
                'rating'=>mt_rand(1,9),
                'shop_id'=>Auth::user()->shop_id,
                'category_id'=>$request->category_id,
                'goods_price'=>$request->goods_price,
                'description'=>$request->description,
                'month_sales'=>mt_rand(1,9999),
                'rating_count'=>mt_rand(1,9999),
                'tips'=>$request->tips,
                'satisfy_count'=>mt_rand(1,9999),
                'satisfy_rate'=>mt_rand(1,9999),
                'goods_img'=>$path,
                'status'=>$request->status,
            ];

        Menu::create($data);

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
            $menus = Menu::where($wheres)->where('shop_id','=',Auth::user()->shop_id)->get();
            return view('menu.index',compact('menus','keyword'));
        }

        public function edit(Menu $menu){
            $menu_categorys = Menu_Category::where('shop_id','=',Auth::user()->shop_id)->get();
            return view('menu.edit',compact('menu','menu_categorys'));
        }

        public function update(Menu $menu,Request $request)
         {
             $goods_img = $request->file('goods_img');
             $menu_id = $request->input('menu_id');
             $res = Menu::find($menu_id)->first();

             if(file_exists($res->goods_img)){
                    unlink($res->goods_img);
             }
             if($goods_img){//上传图片
                 $path = $goods_img->store(date('Ymd'));
             }else{//没有上传图片
                 $path = '';
             }
             $menu->goods_img = $path;
             $menu->rating = mt_rand(10,9999);
             $menu->goods_name = $request->goods_name;
             $menu->category_id = $request->category_id;
             $menu->goods_price = $request->goods_price;
             $menu->description = $request->description;
             $menu->month_sales = mt_rand(10,9999);
             $menu->rating_count = mt_rand(10,9999);
             $menu->satisfy_count = mt_rand(10,9999);
             $menu->satisfy_rate = mt_rand(10,9999);
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
