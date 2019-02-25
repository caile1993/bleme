@extends('layout.app')
@include('vendor.ueditor.assets')
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
</script>

<!-- 编辑器容器 -->
<script id="container" name="content" type="text/plain"></script>
@section('contents')
    <h3 align="center">活动列表</h3>
    <table class="table table-bordered">
        <tr align="center" bgcolor="aqua">
            <th>ID</th>
            <th>活动名称</th>
            <th>活动开始时间</th>
            <th>活动结束时间</th>
            <th>操作</th>
        </tr>

        <tr>
            @foreach($activitys as $activity)
                <td>{{$activity->id}}</td>
                <td>{{$activity->title}}</td>
                <td>{{$activity->start_time}}</td>
                <td>{{$activity->end_time}}</td>
                <td>
                    <a href="{{route('activitys.show',[$activity])}}" class="btn btn-info">查看详情</a>
                </td>
        </tr>
        @endforeach
    </table>
    {{ $activitys->appends(['keyword'=>$keyword])->links() }}


@stop

