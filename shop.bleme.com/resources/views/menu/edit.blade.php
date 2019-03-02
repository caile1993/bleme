@extends('layout.app')

@section('contents')
    <h3 align="">修改菜品</h3>
    @include('layout._errors')
    <form method="post" action="{{route('menus.update',[$menu])}}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">名称：</label>
            <input type="text" name="goods_name" class="form-control" value="{{ $menu->goods_name }}">
        </div>

        <div class="form-group">
            <label for="category_id">所属分类：</label>
           <select class="form-control" name="category_id">
               <option>请选择分类</option>
               @foreach($menu_categorys as $menu_category)
                   <option value="{{$menu_category->id}}">{{$menu_category->name}}</option>
                   @endforeach
           </select>
        </div>

        <div class="form-group">
            <label for="goods_price">价格：</label>
            <input type="text" name="goods_price" class="form-control" value="{{ $menu->goods_price }}">
        </div>

        <div class="form-group">
            <label>描述：</label>
                <textarea name="description" class="form-control" rows="3" placeholder="描述">{{ $menu->description }}</textarea>
          </div>

        <div class="form-group">
            <label for="tips">提示信息：</label>
            <input type="text" name="tips" class="form-control" value="{{ $menu->tips }}">
        </div>


        <div class="form-group">
            <label for="rating_count">商品图片：</label>
            <img style="width: 50px" src="{{$menu->goods_img()}}"/>
            <input type="file" name="goods_img" class="form-control"/>
            <input type="hidden" name="menu_id" value="{{$menu->id}}" class="form-control"/>
        </div>

        <div class="form-group">
            <label>状态：</label>
            <input type="radio" name="status" value="1"  @if($menu->status==1) checked @endif/>上架
            <input type="radio" name="status" value="0" @if($menu->status==0) checked @endif />下架

        </div>

        {{ csrf_field() }}
        {{method_field('patch')}}
        <button type="submit" class="btn btn-primary">提交</button>
    </form>
@stop