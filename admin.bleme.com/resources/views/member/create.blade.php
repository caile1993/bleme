@extends('layout.app')
@section('contents')
    <form role="form"  method="post" action="{{route('members.store')}}">
        {{ csrf_field() }}
        <div class="form-group">
        <span class="input-group-text"><i class="fa fa-user"></i></span>
            <input type="text" name="username" class="form-control" placeholder="Username">
        </div>

        <div class="form-group">
            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
            <input type="text" name="tel" class="form-control" placeholder="tel">
        </div>

        <div class="form-group">
            <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
            <input type="password" name="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-default">提交</button>
    </form>

@stop