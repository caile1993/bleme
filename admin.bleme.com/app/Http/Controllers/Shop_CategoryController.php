<?php

namespace App\Http\Controllers;

use App\Models\Shop_Category;
use Illuminate\Http\Request;

class Shop_CategoryController extends Controller
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
            'img'=>'required|image|max:2048',
            'status'=>'required',
        ],[
            'name.required'=>'名称不能为空',
            'img.required'=>'图片不能为空',
            'img.image'=>'图片格式不正确',
            'status.required'=>'状态不能为空',
        ]);

        //保存图片
        $img = $request->file('img');
        $path = $img->store(date('Ymd'));
        Shop_Category::create([
            'name' => $request->name,
            'status'=>$request->status,
            'img'=>$path,
        ]);

        return redirect()->route('shop_categorys.index')->with('success','添加成功');
    }
        //删除
        public function destroy(Shop_Category $shop_category){
        $shop_category->delete();
        return redirect()->route('shop_categorys.index')->with('success','删除成功');
      }

        public function edit(Shop_Category $shop_category){
            return view('shop_category.edit',['shop_category'=>$shop_category]);
        }

    public function update(Shop_Category $shop_category,Request $request){
        $shop_category->name = $request->name;
        $shop_category->status = $request->status;
            $img = $request->file('img');
            $category_id = $request->input('category_id');
            $result = Shop_Category::find($category_id)->first();
            if(file_exists($result->img)){
                unlink($result->img);
                if($img){//上传图片之后
                    $path = $img->store(date('Ymd'));
//                $path = $img->store('public/images');
                }else{//没有上传图片
                    $path = '';
                }
                $shop_category->img = $path;
                $shop_category->save();
            }
            return redirect()->route('shop_categorys.index')->with('success','修改成功');
    }

}
