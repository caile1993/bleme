@extends('layout.app')
@section('contents')
    <h1 align="center">商家注册</h1>
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>注册</h5>
            </div>
            <div class="panel-body">
                @include('layout._errors')
                <form method="POST" action="{{route('sigup.store')}}" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">选择店铺类型：</label>
                        <select class="form-control" name="shop_category_id">
                            @foreach($shop_categorys as $shop_category)
                                <option value="{{$shop_category->id}}">{{$shop_category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">店铺名称：</label>
                        <input type="text" name="shop_name" class="form-control" value="{{ old('shop_name') }}">
                    </div>

                    <div class="form-group">
                        <label for="img">店铺图片：</label>
                        <input type="file" name="shop_img" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">店铺评分：</label>
                        <input type="text" name="shop_rating" class="form-control" value="{{ old('shop_rating') }}">
                    </div>

                    <div class="form-group">
                        <label for="email">是否品牌：</label>
                        <input type="radio" name="brand"  value="1">是
                        <input type="radio" name="brand"  value="0">否
                    </div>

                    <div class="form-group">
                        <label for="radio">是否准时送达：</label>
                        <input type="radio" name="on_time"  value="1">是
                        <input type="radio" name="on_time"  value="0">否
                    </div>
                    <div class="form-group">
                        <label for="radio">是否蜂鸟配送：</label>
                        <input type="radio" name="fengniao"  value="1">是
                        <input type="radio" name="fengniao" value="0">否
                    </div>

                    <div class="form-group">
                        <label for="radio">是否保标记：</label>
                        <input type="radio" name="bao"  value="1">是
                        <input type="radio" name="bao"  value="0">否
                    </div>

                    <div class="form-group">
                        <label for="password">是否票标记：</label>
                        <input type="radio" name="piao"  value="1">是
                        <input type="radio" name="piao"  value="0">否
                    </div>
                    <div class="form-group">
                        <label for="password">是否准标记：</label>
                        <input type="radio" name="zhun"  value="1">是
                        <input type="radio" name="zhun"  value="0">否
                    </div>

                    <div class="form-group">
                        <label for="name">起送金额：</label>
                        <input type="text" name="start_send" class="form-control" value="{{ old('start_send') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">配送费：</label>
                        <input type="text" name="send_cost" class="form-control" value="{{ old('send_cost') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">公告：</label>
                        <textarea name="notice" class="form-control" rows="3" placeholder="公告"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">优惠信息：</label>
                        <textarea name="discount" class="form-control" rows="3" placeholder="优惠信息"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="name">商家账号：</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="email">邮箱：</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">所属商家：</label>
                        <select name="shop_id">
                        @foreach($shops as $shop)
                        <option value="">请选择所属商家</option>
                        <option value="{{$shop->id}}">{{$shop->shop_name}}</option>
                        @endforeach
                        </select>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">立即注册</button>
                </form>
                <hr>
                <p>有账号？<a href="{{route('login')}}">现在登录！</a></p>
            </div>
        </div>
    </div>
@stop