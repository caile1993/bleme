@extends('layout.app')

@section('contents')
    <h3 align="">修改菜品分类</h3>
    @include('layout._errors')
    <form method="post" action="{{route('menu_categorys.update',[$menu_category])}}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">名称：</label>
            <input type="text" name="name" class="form-control" value="{{ $menu_category->name }}">
        </div>


        <div class="form-group">
            <label>描述：</label>
                <textarea name="description" class="form-control" rows="3" placeholder="描述">{{ $menu_category->description }}</textarea>
          </div>

        <div class="form-group">
            <label>默认分类：</label>
            <input type="radio" name="is_selected" value="1"  @if($menu_category->is_selected==1) checked @endif/>是
            <input type="radio" name="is_selected" value="0"  @if($menu_category->is_selected==0) checked @endif />否

        </div>

        {{ csrf_field() }}
        {{method_field('patch')}}
        <button type="submit" class="btn btn-primary">提交</button>
    </form>
@stop