<?php

namespace App\Http\Controllers;

use App\Models\Shop_Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function create(){
        $shop_categorys = Shop_Category::all();
        return view('shop.create',compact('shop_categorys'));
    }
    
}
