{{--@extends('layout.app')--}}

{{--@section('contents')--}}
    {{--<h3 align="">商家账号列表</h3>--}}
    {{--<table class="table table-bordered">--}}
        {{--<tr align="center" bgcolor="aqua">--}}
            {{--<th>ID</th>--}}
            {{--<th>姓名</th>--}}
            {{--<th>邮箱</th>--}}
            {{--<th>状态</th>--}}
            {{--<th>所属商家</th>--}}
            {{--<th>操作</th>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--@foreach($users as $user)--}}
                {{--<td>{{$user->id}}</td>--}}
                {{--<td>{{$user->name}}</td>--}}
                {{--<td>{{$user->email}}</td>--}}
                {{--<td>{{$user->status== 1?'启用':'禁用'}}</td>--}}
                {{--<td>{{$user->shop->shop_name}}</td>--}}

                {{--<td>--}}
                    {{--<a href="{{route('users.edit',[$user])}}" class="btn btn-info">编辑</a>--}}
                    {{--<form style="display: inline" method="post" action="{{route('users.destroy',[$user])}}">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--{{ method_field('delete') }}--}}
                        {{--<button type="submit" class="btn btn-danger">删除</button>--}}
                    {{--</form>--}}
                {{--</td>--}}
        {{--</tr>--}}
        {{--@endforeach--}}
    {{--</table>--}}
    {{--{{ $users->appends(['keyword'=>$keyword])->links() }}--}}
{{--@stop--}}