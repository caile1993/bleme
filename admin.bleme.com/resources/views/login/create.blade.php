@extends('layout.app')

@section('contents')
    <form method="POST" action="{{ route('login') }}">
        {{csrf_field()}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-header text-center text-uppercase h4 font-weight-light">
                        管理员登录
                    </div>
                    <div class="card-body py-5">
                        <div class="form-group">
                            <label class="form-control-label">用户名</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">密码</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="custom-control custom-checkbox mt-4">
                            <input type="checkbox" class="custom-control-input" id="login" name="remember" >
                            <label class="custom-control-label" for="login">记住我</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary px-5">登录</button>
                            </div>

                            <div class="col-6">
                                <a href="#" class="btn btn-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
@stop