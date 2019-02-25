@extends('layout.app')

@section('contents')
    <table class="table table-bordered">
        <tr align="center" bgcolor="aqua">
            <div class="jumbotron">
                <h2>活动详情</h2>
                <p>{{$activity->title}}</p>
            </div>
    </table>
    <a href="{{route('activitys.index')}}" class="btn btn-info">返回列表</a>
@stop