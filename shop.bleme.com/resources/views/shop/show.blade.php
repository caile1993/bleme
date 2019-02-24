@extends('layout.app')

@section('contents')
    <h3 align="center">商家信息详情</h3>
    <table class="table table-bordered">
        <tr align="center" bgcolor="aqua">
            <th>ID</th>
            <th>是否是品牌</th>
            <th>是否准时送达</th>
            <th>是否蜂鸟配送</th>
            <th>是否保标记</th>
            <th>是否票标记</th>
            <th>是否准标记</th>
            <th>店公告</th>
            <th>优惠信息</th>
        </tr>
        <tr align="center">
                <td>{{$shop->id}}</td>
                <td>{{$shop->brand==1?'是':'否'}}</td>
                <td>{{$shop->on_time==1?'是':'否'}}</td>
                <td>{{$shop->fengniao==1?'是':'否'}}</td>
                <td>{{$shop->bao==1?'是':'否'}}</td>
                <td>{{$shop->piao==1?'是':'否'}}</td>
                <td>{{$shop->zhun==1?'是':'否'}}</td>
                <td>{{$shop->notice}}</td>
                <td>{{$shop->discount}}</td>
        </tr>
    </table>
    <a href="{{route('shops.index')}}" class="glyphicon glyphicon-menu-left">返回列表</a>
@stop