@extends('layout.app')

@section('contents')
    <h3 align="">修改管理员</h3>
    @include('layout._errors')
    <form method="post" action="{{route('admins.update',[$admin])}}" >
        <div class="form-group" style="width: 300px">
            <label>姓名:</label>
            <input type="text" name="name" class="form-control" value="{{$admin->name}}">
        </div>

        <div class="form-group" style="width: 300px">
            <label>邮箱:</label>
            <input type="text" name="email" class="form-control" value="{{$admin->email}}">
        </div>

        <div class="form-group" style="width: 300px">
            <label>密码:</label>
            <input type="password" name="password" class="form-control" value="{{$admin->password}}">
        </div>

        {{ csrf_field() }}
        {{ method_field('patch') }}
        <button type="submit" class="btn btn-primary">提交</button>
    </form>
    @stop