<?php

namespace App\Http\Controllers;

use App\Models\Shop_Category;
use Illuminate\Http\Request;

class Shop_CategoryController extends Controller
{
    //
    public function index(Request $request){


        $keyword = $request->keyword;

        if($keyword){
            $shop_categorys = Shop_Category::where('name','like',"%$keyword%")->paginate(3);
        }else{
            $shop_categorys =  Shop_Category::paginate(3);
        }
        return view('shop_category.index',compact('shop_categorys','keyword'));
    }

    public function create(){
        return view('shop_category.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'img'=>'image|max:2048',
            'status'=>'required',
        ],[
            'name.required'=>'姓名不能为空',
            'img.image'=>'图片大小不能超过2M',
            'status.required'=>'状态不能为空'
        ]);
            $img = $request->file('img');
            $path = $img->store('public/images');
        Shop_Category::create([
            'name'=>$request->name,
            'img'=>$path,
            'status'=>$request->status,
        ]);

        return redirect()->route('shop_category.index')->with('success','添加成功');
    }

    public function edit(Shop_Category $shop_Category){
        return view('shop_category.edit',compact('shop_Category'));
    }
    public function update(Shop_Category $shop_Category,Request $request){
        dd($shop_Category);
        $shop_Category->name = $request->name;
        $img = $request->file('img');
//        dd($img);
        if($img){
            $path = $img->store('public/images');
        }else{
            $path = '';
        }
        $shop_Category->img = $path;

        $shop_Category->status = $request->status;

        $shop_Category->save();

        return redirect()->route('shop_category.index')->with('success','修改成功');
    }

    //删除
    public function destroy(Shop_Category $shop_Category){
        $shop_Category->delete();
        session()->flash('success','删除成功');
        return redirect()->route('shop_category.index');
    }

}
