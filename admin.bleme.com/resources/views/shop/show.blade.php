@extends('layout.app')
@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">
        </div>
        <div class="panel-body" >
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
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
                    </thead>
                    <tbody>
                        <tr class="odd gradeX">
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <a href="{{route('shops.index')}}" class="glyphicon glyphicon-menu-left">返回列表</a>
@stop