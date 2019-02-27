@extends('layout.app')

@section('contents')
    {{--<h3 align="center">管理员列表</h3>--}}

    {{--<table class="table table-bordered">--}}
        {{--<tr align="center" bgcolor="aqua">--}}
            {{--<th>ID</th>--}}
            {{--<th>姓名</th>--}}
            {{--<th>邮箱</th>--}}
            {{--<th>操作</th>--}}
        {{--</tr>--}}
            {{--<tr>--}}
            {{--@foreach($admins as $admin)--}}
             {{--<td>{{$admin->id}}</td>--}}
             {{--<td>{{$admin->name}}</td>--}}
             {{--<td>{{$admin->email}}</td>--}}

                {{--<td>--}}
                    {{--<a href="{{route('admins.edit',[$admin])}}" class="btn btn-info">编辑</a>--}}
                    {{--<form style="display: inline" method="post" action="{{route('admins.destroy',[$admin])}}">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--{{ method_field('delete') }}--}}
                        {{--<button type="submit" class="btn btn-danger">删除</button>--}}
                    {{--</form>--}}
                {{--</td>--}}
            {{--</tr>--}}
        {{--@endforeach--}}
    {{--</table>--}}
    {{--{{ $admins->appends(['keyword'=>$keyword])->links() }}--}}

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
                        <th>邮箱</th>
                        <th>操作</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $admin)
                    <tr class="odd gradeX">
                        <td>{{$admin->id}}</td>
                        <td>{{$admin->name}}</td>
                        <td>{{$admin->email}}</td>
                        <td class="center">
                            <a href="{{route('admins.edit',[$admin])}}" class="btn btn-info">编辑</a>
                            <form style="display: inline" method="post" action="{{route('admins.destroy',[$admin])}}">
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