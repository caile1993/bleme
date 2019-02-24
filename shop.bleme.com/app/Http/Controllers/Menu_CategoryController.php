<?php

namespace App\Http\Controllers;

use App\Models\Menu_Category;
use Illuminate\Http\Request;

class Menu_CategoryController extends Controller
{
    //首页
    public function index(Request $request){
        $keyword = $request->keyword;

        if ($keyword){
            $menu_categorys = Menu_Category::where('name','like',"%$keyword%")->paginate(3);
        }else{
            $menu_categorys = Menu_Category::paginate(3);
        }
        return view('menu_category.index',compact('menu_categorys','keyword'));
    }
    public function create()
    {
        return view('menu_category.create');
    }


}
