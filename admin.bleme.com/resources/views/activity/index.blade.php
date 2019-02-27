@extends('layout.app')

@section('contents')

    <form class="navbar-form navbar-left">
        <div class="form-group">
            <select name="keyword" class="form-group">
                <option value="">请选择</option>
                <option value="1">未开始</option>
                <option value="2">进行中</option>
                <option value="3">已结束</option>
            </select>
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
    </form>
    <h3 align="center">活动列表</h3>
    <table class="table table-bordered">
        <tr align="center" bgcolor="aqua">
            <th>ID</th>
            <th>活动名称</th>
            <th>活动详情</th>
            <th>活动开始时间</th>
            <th>活动结束时间</th>
            <th>状态</th>
            <th>操作</th>
        </tr>

            <tr>
            @foreach($activitys as $activity)
             <td>{{$activity->id}}</td>
             <td>{{$activity->title}}</td>
             <td>{!! $activity->content !!}</td>
             <td>{{$activity->start_time}}</td>
             <td>{{$activity->end_time}}</td>
                    <td>@if($activity->start_time>date('Y-m-d H:i:s'))未开始
                        @elseif($activity->end_time<date('Y-m-d H:i:s'))已结束
                        @elseif($activity->end_time>date('Y-m-d H:i:s'))进行中
                        @endif
                    </td>
                <td>
                    <a href="{{route('activitys.edit',[$activity])}}" class="btn btn-info">编辑</a>
                    <form style="display: inline" method="post" action="{{route('activitys.destroy',[$activity])}}">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $activitys->appends(['keyword'=>$keyword])->links() }}
@stop