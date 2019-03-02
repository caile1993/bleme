@extends('layout.app')

@section('contents')
    <form class="navbar-form navbar-left">
        <div class="">
            <input type="text" name="min_price" class="" placeholder="最低价格">
        </div>
        ---
        <div class="">
            <input type="text" name="max_price" class="" placeholder="最高价格">
        </div>
        ---
        <div class="">
            <input type="text" name="keyword" class="" placeholder="名称">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
    </form>
    <h3 align="center">菜品列表</h3>
    <table class="table table-bordered">
        <tr align="center" bgcolor="aqua">
            <th>ID</th>
            <th>名称</th>
            <th>评分</th>
            <th>菜品分类</th>
            <th>价格</th>
            <th>描述</th>
            <th>月销量</th>
            <th>评分数量</th>
            <th>提示信息</th>
            <th>满意度数量</th>
            <th>满意度评分</th>
            <th>商品图片</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        <tr>
            @foreach($menus as $menu)
                <td>{{$menu->id}}</td>
                <td>{{$menu->goods_name}}</td>
                <td>{{$menu->rating}}</td>
               <td>{{$menu->menu_category->name}}</td>
                <td>{{$menu->goods_price}}</td>
                <td>{{$menu->description}}</td>
                <td>{{$menu->month_sales}}</td>
                <td>{{$menu->rating_count}}</td>
                <td>{{$menu->tips}}</td>
                <td>{{$menu->satisfy_count}}</td>
                <td>{{$menu->satisfy_rate}}</td>
                    <td>
                    <img style="width: 50px" src="{{$menu->goods_img()}}"/>
                    </td>
                <td>{{$menu->status== 1?'上架中':'已下架'}}</td>

                <td>
                    @if($menu->status)
                    <a href="{{route('menus.set',[$menu])}}" class="btn btn-info">下架</a>
                    @else
                        <a href="{{route('menus.set',[$menu])}}" class="btn btn-info">上架</a>
                    @endif
                    <a href="{{route('menus.edit',[$menu])}}" class="btn btn-info">编辑</a>
                    <form style="display: inline" method="post" action="{{route('menus.destroy',[$menu])}}">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button type="submit" class="btn btn-danger" onclick="return confirm('确认要删除吗?')">删除</button>
                    </form>
                </td>
        </tr>
        @endforeach
    </table>
    {{--{{ $menus->appends(['keyword'=>$keyword])->links() }}--}}
@stop