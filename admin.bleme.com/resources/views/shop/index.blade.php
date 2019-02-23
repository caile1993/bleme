@extends('layout.app')

@section('contents')
    <h3 align="center">商家信息列表</h3>
    <table class="table table-bordered">
        <tr align="center" bgcolor="aqua">
            <th>ID</th>
            <th>店铺分类</th>
            <th>店铺名称</th>
            <th>店铺图片</th>
            <th>评分</th>
            <th>起送金额</th>
            <th>配送费</th>
            <th>状态</th>
            <th>操作</th>
        </tr>

        <tr>
            @foreach($shops as $shop)
                <td>{{$shop->id}}</td>
                <td>{{$shop->shop_category->name}}</td>
                <td>{{$shop->shop_name}}</td>
                <td>
                    <img style="width: 50px" src="{{$shop->shop_img()}}"  class="img-circle">
                </td>
                <td>{{$shop->shop_rating}}</td>
                <td>{{$shop->start_send}}</td>
                <td>{{$shop->send_cost}}</td>
                <td>
                    @if($shop->status==1)正常@elseif($shop->status==0)待审核@else禁用 @endif
                </td>

                <td>
                    <a href="{{route('shops.edit',[$shop])}}" class="glyphicon glyphicon-pencil"></a>
                    <a href="{{route('shops.show',[$shop])}}" class="glyphicon glyphicon-search"></a>
                    <form style="display: inline" method="post" action="{{route('shops.destroy',[$shop])}}">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" class="
glyphicon glyphicon-remove-circle"></button>
                    </form>
                </td>
        </tr>
        @endforeach
    </table>
    {{ $shops->appends(['keyword'=>$keyword])->links() }}
@stop