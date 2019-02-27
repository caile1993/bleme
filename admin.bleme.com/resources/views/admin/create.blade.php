@extends('layout.app')
@section('contents')
    <form role="form"  method="post" action="{{route('admins.store')}}">
        {{ csrf_field() }}
        <div class="form-group">
        <span class="input-group-text"><i class="fa fa-user"></i></span>
            <input type="text" name="name" class="form-control" placeholder="Username">
        </div>

        <div class="form-group">
            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
            <input type="text" name="email" class="form-control" placeholder="email">
        </div>

        <div class="form-group">
            <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
            <input type="password" name="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
        </div>
        {{--<div class="form-group">--}}
            {{--<label for="exampleInputFile">File input</label>--}}
            {{--<input type="file" id="exampleInputFile3">--}}
            {{--<p class="help-block">Example block-level help text here.</p>--}}
        {{--</div>--}}
        {{--<div class="checkbox">--}}
            {{--<label>--}}
                {{--<input type="checkbox"> Check me out--}}
            {{--</label>--}}
        {{--</div>--}}
        <button type="submit" class="btn btn-default">提交</button>
    </form>

@stop