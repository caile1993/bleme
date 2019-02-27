@extends('layout.app')

@section('contents')

    <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>

    <!--引入CSS-->
    <link rel="stylesheet" type="text/css" href="/webuploader/webuploader.css">

    <!--引入JS-->
    <script type="text/javascript" src="/webuploader/webuploader.js"></script>

    <h3 align="">添加菜品</h3>
    @include('layout._errors')
    <form method="post" action="{{ route('menus.store') }}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">名称：</label>
            <input type="text" name="goods_name" class="form-control" value="{{ old('goods_name') }}">
        </div>

        <div class="form-group">
            <label for="rating">评分：</label>
            <input type="text" name="rating" class="form-control" value="{{ old('rating') }}">
        </div>
        <div class="form-group">
            <label for="category_id">所属分类：</label>
           <select class="form-control" name="category_id">
               <option>请选择分类</option>
               @foreach($menu_categorys as $menu_category)
                   <option value="{{$menu_category->id}}">{{$menu_category->name}}</option>
                   @endforeach
           </select>
        </div>

        <div class="form-group">
            <label for="goods_price">价格：</label>
            <input type="text" name="goods_price" class="form-control" value="{{ old('goods_price') }}">
        </div>

        <div class="form-group">
            <label>描述：</label>
                <textarea name="description" class="form-control" rows="3" placeholder="描述"></textarea>
          </div>

        <div class="form-group">
            <label for="month_sales">月销量：</label>
            <input type="text" name="month_sales" class="form-control" value="{{ old('month_sales') }}">
        </div>

        <div class="form-group">
            <label for="rating_count">评分数量：</label>
            <input type="text" name="rating_count" class="form-control" value="{{ old('rating_count') }}">
        </div>

        <div class="form-group">
            <label for="tips">提示信息：</label>
            <input type="text" name="tips" class="form-control" value="{{ old('tips') }}">
        </div>

        <div class="form-group">
            <label for="rating_count">满意度数量：</label>
            <input type="text" name="satisfy_count" class="form-control" value="{{ old('satisfy_count') }}">
        </div>

        <div class="form-group">
            <label for="rating_count">满意度评分：</label>
            <input type="text" name="satisfy_rate" class="form-control" value="{{ old('satisfy_rate') }}">
        </div>

        <div class="form-group">
            <label for="goods_img">商品图片：</label>
                <input type="file" name="goods_img">
        </div>

        {{--<!--dom结构部分-->--}}
        {{--<div id="uploader-demo">--}}
            {{--<!--用来存放item-->--}}
            {{--<div id="fileList" class="uploader-list"></div>--}}
            {{--<div id="filePicker">选择图片</div>--}}
        {{--</div>--}}

        <div class="form-group">
            <label>状态：</label>
            <input type="radio" name="status" value="1"  />上架
            <input type="radio" name="status" value="0"  />下架

        </div>

        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">提交</button>
    </form>

    {{--<script>--}}
        {{--// 初始化Web Uploader--}}
        {{--var Uploader = WebUploader.create({--}}

            {{--// 选完文件后，是否自动上传。--}}
            {{--auto: true,--}}

            {{--// swf文件路径--}}
            {{--// swf: BASE_URL + '/js/Uploader.swf',--}}

            {{--// 文件接收服务端。--}}
            {{--server: '',--}}

            {{--// 选择文件的按钮。可选。--}}
            {{--// 内部根据当前运行是创建，可能是input元素，也可能是flash.--}}
            {{--pick: '#filePicker',--}}

            {{--// 只允许选择图片文件。--}}
            {{--accept: {--}}
                {{--title: 'Images',--}}
                {{--extensions: 'gif,jpg,jpeg,bmp,png',--}}
                {{--mimeTypes: 'image/*'--}}
            {{--}--}}
        {{--});--}}
    {{--</script>--}}
@stop