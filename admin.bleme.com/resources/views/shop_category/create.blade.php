@extends('layout.app')

@section('contents')
        添加商家分类
    <form role="form"  method="post" action="{{route('shop_categorys.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <span class="input-group-text"><i class="fa fa-user"></i></span>
            <input type="text" name="name" class="form-control" placeholder="名称">
        </div>

        {{--<div class="form-group">--}}
            {{--<span class="input-group-text"><i class="fa fa-envelope"></i></span>--}}
            {{--<input type="text" name="email" class="form-control" placeholder="email">--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--<span class="input-group-text"><i class="fa fa-credit-card"></i></span>--}}
            {{--<input type="password" name="password" class="form-control" id="exampleInputPassword3" placeholder="Password">--}}
        {{--</div>--}}

        <div class="radio">
            <label>
                <input type="radio" name="status" id="optionsRadios1" value="1" checked="">
                显示
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" id="optionsRadios2" value="0">
                 隐藏
            </label>
        </div>

        <div class="form-group">
            <p class="help-block"></p>
        <label for="exampleInputFile">File input</label>
        <input type="file" name="img" id="exampleInputFile3">
        </div>
        <button type="submit" class="btn btn-default">提交</button>
    </form>

@stop
