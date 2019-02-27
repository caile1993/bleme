@extends('layout.app')

@section('contents')
    <form method="POST" action="{{ route('passwd') }}">
        {{csrf_field()}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card p-4">
                        <div class="card-header text-center text-uppercase h4 font-weight-light">
                            修改密码
                        </div>
                            <div class="form-group">
                                <label class="form-control-label">旧密码</label>
                                <input type="password" name="old_password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">新密码</label>
                                <input type="password" name="new_password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">确认密码</label>
                                <input type="password" name="new_password_confirmation" class="form-control">
                            </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary px-5">完成</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop