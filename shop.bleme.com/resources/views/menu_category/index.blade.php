@extends('layout.app')

@section('contents')
    <h3 align="">菜品分类列表</h3>
    <table class="table table-bordered">
        <tr align="center" bgcolor="aqua">
            <th>ID</th>
            <th>名称</th>
            <th>菜品编号</th>
            <th>所属商家</th>
            <th>默认分类</th>
            <th>操作</th>
        </tr>
        <tr>
            @foreach($menu_categorys as $menu_category)
                <td>{{$menu_category->id}}</td>
                <td>{{$menu_category->name}}</td>
                <td>{{$menu_category->type_accumulation}}</td>
                <td>{{$menu_category->shop_id}}</td>
                <td>{{$menu_category->description}}</td>
                <td>{{$menu_category->is_selected== 1?'是':'否'}}</td>


                {{--<td>--}}
                    {{--<a href="{{route('menu_categorys.edit',[$user])}}" class="btn btn-info">编辑</a>--}}
                    {{--<form style="display: inline" method="post" action="{{route('users.destroy',[$user])}}">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--{{ method_field('delete') }}--}}
                    {{--<button type="submit" class="btn btn-danger">删除</button>--}}
                    {{--</form>--}}
                {{--</td>--}}
        </tr>
        @endforeach
    </table>
    {{ $menu_categorys->appends(['keyword'=>$keyword])->links() }}
@stop