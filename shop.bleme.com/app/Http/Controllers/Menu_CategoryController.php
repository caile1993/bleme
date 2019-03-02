<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Menu_Category;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Menu_CategoryController extends Controller
{
    //登录认证
     public function __construct()
    {
        $this->middleware('auth');

    }

    //首页
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        if($keyword){
            $menu_categorys = Menu_Category::where('shop_id','=',Auth::user()->shop_id)->where('name','like',"%$keyword%")->paginate(3);
        }else{
            $menu_categorys = Menu_Category::where('shop_id','=',Auth::user()->shop_id)->paginate(3);
        }
        return view('menu_category.index',compact('menu_categorys','keyword'));

    }

     public function create()
      {
        $shops = Shop::all();
        return view('menu_category.create',compact('shops'));
      }

     public function store(Request $request){
            $this->validate($request,[
                'name' =>'required',
                'description' =>'required',
                'is_selected' =>'required',
            ],[
                'name.required'=>'请填写名称',
                'description.required'=>'请填写描述',
                'is_selected.required'=>'请选择是否为默认',
            ]);
            Menu_Category::create([
                'name'=>$request->name,
                'type_accumulation'=>range('a','z')[rand(0,25)],
                'shop_id'=>Auth::user()->shop_id,
                'description'=>$request->description,
                'is_selected'=>$request->is_selected,
            ]);
            return redirect()->route('menu_categorys.index')->with('success','添加成功');
    }

    public function edit(Menu_Category $menu_category)
    {
        $shops  = Shop::all();
        return view('menu_category.edit',compact('menu_category','shops'));
    }

    public function update(Request $request,Menu_Category $menu_category)
    {
        $menu_category->name = $request->name;
        $menu_category->shop_id = $request->shop_id;
        $menu_category->description = $request->description;
        $menu_category->is_selected = $request->is_selected;

        $menu_category->save();
        return redirect()->route('menu_categorys.index')->with('success','修改成功');
    }
    //默认设置
    public function set(Menu_Category $menu_category)
    {
                Menu_Category::where('is_selected','=','1')->where('shop_id','=',Auth::user()->shop_id)->update(['is_selected'=>0]);
                $menu_category->is_selected = 1;
                $menu_category->save();
                return back()->with('success', '设置成功');
    }
        public function destroy(Menu_Category $menu_category){
            $mens = Menu::all()->where('category_id',$menu_category->id)->first();
            if($mens){
                return back()->with('danger','有子分类删除失败');
            }else{
                $menu_category->delete();
                return redirect()->route('menu_categorys.index')->with('success','删除成功');
            }
        }
}
