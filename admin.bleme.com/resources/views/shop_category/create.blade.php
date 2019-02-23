@extends('layout.app')

@section('contents')
    <h3 align="">添加商家分类</h3>
    @include('layout._errors')
    <form method="post" action="{{ route('shop_categorys.store') }}" enctype="multipart/form-data">
        <div class="form-group" style="width: 200px">
            <label>姓名：</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label>图片：</label>
            <input type="file" name="img"  />
        </div>

        <div class="form-radio">
            <label>状态：</label>

            <input type="radio" name="status" value="1" />显示
            <input type="radio" name="status" value="0" />隐藏

        </div>
        {{--<div class="form-group">--}}
        {{--<label>请输入验证码</label>--}}
        {{--<input id="captcha" class="form-control" name="captcha" style="width: 150px">--}}
        {{--<img class="thumbnail captcha" src="{{ captcha_src('default') }}" onclick="this.src='/captcha/default?'+Math.random()" title="点击图片重新获取验证码">--}}
        {{--</div>--}}

        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">提交</button>
    </form>
@stop