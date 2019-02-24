@extends('layout.app')

@section('contents')
    <h1 align="center">商家登录</h1>
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>登录</h5>
            </div>
            <div class="panel-body">
                @include('layout._errors')
                <form method="POST" action="{{ route('login') }}">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">用户名：</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="remember"> 记住我</label>
                    </div>

                    <button type="submit" class="btn btn-primary">登录</button>
                </form>
                <hr>
                <p>还没账号？<a href="{{route('sigup')}}">立即注册！</a></p>
            </div>
        </div>
    </div>
@stop