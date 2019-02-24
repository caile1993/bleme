{{--@extends('layout.app')--}}

{{--@section('contents')--}}
    {{--<h3 align="">添加商家账户</h3>--}}
    {{--@include('layout._errors')--}}
    {{--<form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">--}}
        {{--<div class="form-group" style="width: 200px">--}}
            {{--<label>姓名：</label>--}}
            {{--<input type="text" name="name" class="form-control" value="{{ old('name') }}">--}}
        {{--</div>--}}

        {{--<div class="form-group" style="width: 200px">--}}
        {{--<label>邮箱：</label>--}}
        {{--<input type="text" name="email" class="form-control" value="{{ old('email') }}">--}}
        {{--</div>--}}

        {{--<div class="form-group" style="width: 200px">--}}
            {{--<label>密码：</label>--}}
            {{--<input type="password" name="password" class="form-control" value="{{ old('password') }}">--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--<label>状态：</label>--}}

            {{--<input type="radio" name="status" value="1"  />启用--}}
            {{--<input type="radio" name="status" value="0"  />禁用--}}

        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--<label>所属商家：</label>--}}
                {{--<select name="shop_id">--}}
                    {{--@foreach($shops as $shop)--}}
                        {{--<option value="">请选择所属商家</option>--}}
                    {{--<option value="{{$shop->id}}">{{$shop->shop_name}}</option>--}}
                        {{--@endforeach--}}
                {{--</select>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
        {{--<label>请输入验证码</label>--}}
        {{--<input id="captcha" class="form-control" name="captcha" style="width: 150px">--}}
        {{--<img class="thumbnail captcha" src="{{ captcha_src('default') }}" onclick="this.src='/captcha/default?'+Math.random()" title="点击图片重新获取验证码">--}}
        {{--</div>--}}
        {{--{{ csrf_field() }}--}}
        {{--<button type="submit" class="btn btn-primary">提交</button>--}}
    {{--</form>--}}
{{--@stop--}}