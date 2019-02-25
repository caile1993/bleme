@extends('layout.app')

@section('contents')
    <h1 align="">修改活动</h1>
    @include('layout._errors')
    <form method="post" action="{{ route('activitys.update',[$activity]) }}">
        <div class="form-group">
            <label>活动名称:</label>
            <input type="text" name="title" class="form-control" value="{{$activity->title}}">
        </div>

        <div class="form-group">
            <label>活动详情：</label>
            <textarea name="content" class="form-control" rows="3" placeholder="content">{{$activity->content}}</textarea>
        </div>

        <div class="form-group" >
            <label>活动开始时间:</label>
            <input type="text" name="start_time" class="form-control" value="{{$activity->start_time}}">
        </div>
        <div class="form-group" style="">
            <label>活动结束时间:</label>
            <input type="text" name="end_time" class="form-control" value="{{$activity->end_time}}">
        </div>

        {{ csrf_field() }}
        {{method_field('patch')}}
        <button type="submit" class="btn btn-primary">提交</button>
    </form>
    @stop