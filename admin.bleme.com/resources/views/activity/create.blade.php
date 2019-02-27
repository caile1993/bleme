@extends('layout.app')
@include('vendor.ueditor.assets')
@section('contents')
    <h1 align="">添加活动</h1>
    @include('layout._errors')
    <form method="post" action="{{ route('activitys.store') }}">
        <div class="form-group">
            <label>活动名称:</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="form-group" >
            <label>活动开始时间:</label>
            <input type="text" name="start_time" class="form-control" value="{{ old('start_time') }}">
        </div>
        <div class="form-group" style="">
            <label>活动结束时间:</label>
            <input type="text" name="end_time" class="form-control" value="{{ old('end_time') }}">
        </div>
        <!-- 实例化编辑器 -->
        <script type="text/javascript">

            var ue = UE.getEditor('container');
            ue.ready(function() {
                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
            });

        </script>
        <!-- 编辑器容器 -->
        <label>活动详情：</label>
        <script id="container" name="content" type="text/plain"></script>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">提交</button>
    </form>
    @stop