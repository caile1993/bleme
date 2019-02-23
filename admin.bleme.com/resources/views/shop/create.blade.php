@extends('layout.app')

@section('contents')
    <h3 align="center">添加商家信息</h3>
    @include('layout._errors')

    <form class="form-horizontal" method="post" action="{{route('shops.store')}}"  enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">店铺分类：</label>
            <div class="col-sm-10">
                <select class="form-control" name="shop_category_id">
                    @foreach($shop_categorys as $shop_category)
                    <option value="{{$shop_category->id}}">{{$shop_category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">店铺名称：</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="shop_name" placeholder="店铺名称">
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputFile" class="col-sm-2 control-label">店铺图片：</label>
            <input type="file" name="shop_img">
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">店铺评分：</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="shop_rating" placeholder="店铺评分">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否品牌：</label>
            <div class="col-sm-10">
                <input type="radio" class="form-radio" name="brand" value="1">是
                <input type="radio" class="form-radio"  name="brand" value="0">否
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否准时送达：</label>
            <div class="col-sm-10">
                <input type="radio" class="form-radio" name="on_time" value="1">是
                <input type="radio" class="form-radio"  name="on_time" value="0">否
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否蜂鸟配送：</label>
            <div class="col-sm-10">
                <input type="radio" class="form-radio" name="fengniao" value="1">是
                <input type="radio" class="form-radio"  name="fengniao" value="0">否
            </div>
        </div>



        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否保标记：</label>
            <div class="col-sm-10">
                <input type="radio" class="form-radio" name="bao" value="1">是
                <input type="radio" class="form-radio"  name="bao" value="0">否
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否票标记：</label>
            <div class="col-sm-10">
                <input type="radio" class="form-radio" name="piao" value="1">是
                <input type="radio" class="form-radio"  name="piao" value="0">否
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否准标记：</label>
            <div class="col-sm-10">
                <input type="radio" class="form-radio" name="zhun" value="1">是
                <input type="radio" class="form-radio"  name="zhun" value="0">否
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">起送金额：</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="start_send" placeholder="起送金额">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">配送费：</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="send_cost" placeholder="配送费">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">公告：</label>
            <div class="col-sm-10">
                <textarea name="notice" class="form-control" rows="3" placeholder="公告"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">优惠信息：</label>
            <div class="col-sm-10">
                <textarea name="discount" class="form-control" rows="3" placeholder="优惠信息"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">状态：</label>
            <div class="col-sm-10">
                <input type="radio" class="form-radio" name="status" value="1">正常
                <input type="radio" class="form-radio"  name="status" value="0">待审核
                <input type="radio" class="form-radio"  name="status" value="-1">禁用
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@stop