@extends('layout.app')

@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">
        </div>
        <div class="panel-body" >
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>id</th>
                        <th>用户名</th>
                        <th>图片</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($shop_categorys as $shop_category)
                        <tr class="odd gradeX">
                            <td>{{$shop_category->id}}</td>
                            <td>{{$shop_category->name}}</td>
                            <td><img style="width: 50px" src="{{$shop_category->img()}}"></td>
                            <td>{{$shop_category->status==1?'显示':'隐藏'}}</td>
                            <td class="center">
                                <a href="{{route('shop_categorys.edit',[$shop_category])}}" class="btn btn-info">编辑</a>
                                <form style="display: inline" method="post" action="{{route('shop_categorys.destroy',[$shop_category])}}">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-danger">删除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop