@extends('layout.app')

@section('contents')
    <h1 align="">添加管理员</h1>
    @include('layout._errors')
    <form method="post" action="{{ route('admins.store') }}">
        <div class="form-group" style="width: 300px">
            <label>姓名:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="form-group" style="width: 300px">
            <label>邮箱:</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="form-group" style="width: 300px">
            <label>密码:</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
        </div>

        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">提交</button>
    </form>
    @stop