@extends('layout.app')

@section('contents')
    <h3 align="">修改商家信息</h3>
    <form role="form"  method="post" action="{{route('shops.update',[$shop])}}" enctype="multipart/form-data">
        {{method_field('patch')}}
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">店铺分类：</label>
            <div class="col-sm-10">
                <select class="form-control" name="shop_category_id">
                    @foreach($shop_categorys as $shop_category)
                    <option value="{{$shop_category->id}}"
                    @if((old('shop_category_id')??$shop->shop_category_id)==$shop_category->id) selected @endif>{{$shop_category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">店铺名称：</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="shop_name" placeholder="店铺名称" value="{{$shop->shop_name}}">
            </div>
        </div>

        <div class="form-group">
            <p class="help-block"> <img style="width: 50px" src="{{$shop->shop_img()}}"></p>
            <label for="exampleInputFile">File input</label>
            <input type="file" name="shop_img" id="exampleInputFile3">
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">店铺评分：</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="shop_rating" placeholder="店铺评分" value="{{$shop->shop_rating}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否品牌：</label>
            <div class="col-sm-10">
                <input type="radio" class="form-radio" name="brand" value="1" @if($shop->brand==1)checked @endif>是
                <input type="radio" class="form-radio"  name="brand" value="0" @if($shop->brand==0)checked @endif>否
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否准时送达：</label>
            <div class="col-sm-10">
                <input type="radio" class="form-radio" name="on_time" value="1" @if($shop->brand==1)checked @endif>是
                <input type="radio" class="form-radio"  name="on_time" value="0" @if($shop->brand==0)checked @endif>否
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否蜂鸟配送：</label>
            <div class="col-sm-10">
                <input type="radio" class="form-radio" name="fengniao" value="1" @if($shop->brand==1)checked @endif>是
                <input type="radio" class="form-radio"  name="fengniao" value="0" @if($shop->brand==0)checked @endif>否
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否保标记：</label>
            <div class="col-sm-10">
                <input type="radio" class="form-radio" name="bao" value="1" @if($shop->brand==1)checked @endif>是
                <input type="radio" class="form-radio"  name="bao" value="0" @if($shop->brand==0)checked @endif>否
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否票标记：</label>
            <div class="col-sm-10">
                <input type="radio" class="form-radio" name="piao" value="1" @if($shop->brand==1)checked @endif>是
                <input type="radio" class="form-radio"  name="piao" value="0" @if($shop->brand==0)checked @endif>否
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否准标记：</label>
            <div class="col-sm-10">
                <input type="radio" class="form-radio" name="zhun" value="1" @if($shop->brand==1)checked @endif>是
                <input type="radio" class="form-radio"  name="zhun" value="0" @if($shop->brand==0)checked @endif>否
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">起送金额：</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="start_send" placeholder="起送金额" value="{{$shop->start_send}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">配送费：</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="send_cost" placeholder="配送费" value="{{$shop->send_cost}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">公告：</label>
            <div class="col-sm-10">
                <textarea name="notice" class="form-control" rows="3" placeholder="公告">{{$shop->notice}}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">优惠信息：</label>
            <div class="col-sm-10">
                <textarea name="discount" class="form-control" rows="3" placeholder="优惠信息">{{$shop->discount}}</textarea>
            </div>
        </div>

        {{--<div class="form-group">--}}
            {{--<label for="inputPassword3" class="col-sm-2 control-label">状态：</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--<input type="radio" class="form-radio" name="status" value="1" @if($shop->brand==1)checked @endif >正常--}}
                {{--<input type="radio" class="form-radio"  name="status" value="0" @if($shop->brand==0)checked @endif>待审核--}}
                {{--<input type="radio" class="form-radio"  name="status" value="-1" @if($shop->brand== -1)checked @endif>禁用--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@stop