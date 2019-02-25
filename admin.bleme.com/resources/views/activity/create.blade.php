@extends('layout.app')

@section('contents')
    <h1 align="">添加活动</h1>
    @include('layout._errors')
    <form method="post" action="{{ route('activitys.store') }}">
        <div class="form-group">
            <label>活动名称:</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label>活动详情：</label>
            <textarea name="content" class="form-control" rows="3" placeholder="content"></textarea>
        </div>

        <div class="form-group" >
            <label>活动开始时间:</label>
            <input type="text" name="start_time" class="form-control" value="{{ old('start_time') }}">
        </div>
        <div class="form-group" style="">
            <label>活动结束时间:</label>
            <input type="text" name="end_time" class="form-control" value="{{ old('end_time') }}">
        </div>

        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">提交</button>
    </form>
    @stop