@extends('layout.app')

@section('contents')
    <h3 align="">管理员列表</h3>
    <table class="table table-bordered" style="width: auto">
        <tr >
            <th>ID</th>
            <th>姓名</th>
            <th>邮箱</th>
            <th>操作</th>
        </tr>

            <tr>
            @foreach($admins as $admin)
             <td>{{$admin->id}}</td>
             <td>{{$admin->name}}</td>
             <td>{{$admin->email}}</td>

                <td>
                    <a href="{{route('admins.edit',[$admin])}}" class="btn btn-info">编辑</a>
                    <form style="display: inline" method="post" action="{{route('admins.destroy',[$admin])}}">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $admins->appends(['keyword'=>$keyword])->links() }}
@stop