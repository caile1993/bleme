<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use App\Models\Menu_Category;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    //商家列表
    public function BusinessList(Request $request){
        $keyword = $request->keyword;
        if($keyword){
            $shops = Shop::where('shop_name','like',"%$keyword%")->get();
        }else{
            $shops = Shop::all();
        }
        return $shops;
    }

    //获取指定商家
    public function Business()
    {
        $id = $_GET['id'];
        $shops = Shop::find($id);
        $menu_categorys = Menu_Category::where('shop_id','=',$id)->get();
        foreach ($menu_categorys as $menu_category){
            $menu_category['goods_list'] =  Menu::where('category_id','=',$menu_category->id)->get();
        }
        $shops['commodity'] = $menu_categorys;
        return $shops;
    }

}
