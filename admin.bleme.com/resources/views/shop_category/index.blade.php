@extends('layout.app')

@section('contents')
    <h3 align="center">商家分类列表</h3>
    <table class="table table-bordered">
        <tr align="center" bgcolor="aqua">
            <th>ID</th>
            <th>姓名</th>
            <th>图片</th>
            <th>状态</th>
            <th>操作</th>
        </tr>

        <tr align="center">
            @foreach($shop_categorys as $shop_category)
                <td>{{$shop_category->id}}</td>
                <td>{{$shop_category->name}}</td>
                <td><img style="width: 100px" src="{{$shop_category->img()}}"></td>
                <td>{{$shop_category->status==1?'显示':'隐藏'}}</td>

                <td>
                    <a href="{{route('shop_categorys.edit',[$shop_category])}}" class="btn btn-info">编辑</a>
                    <form style="display: inline" method="post" action="{{route('shop_categorys.destroy',[$shop_category])}}">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger">删除</button>
                    </form>
                </td>
        </tr>
        @endforeach
    </table>
    {{ $shop_categorys->appends(['keyword'=>$keyword])->links() }}
@stop