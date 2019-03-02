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
                            <button type="submit" class="btn btn-danger" onclick="return confirm('确认要删除吗?')">删除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $admins->appends(['keyword'=>$keyword])->links() }}
@stop