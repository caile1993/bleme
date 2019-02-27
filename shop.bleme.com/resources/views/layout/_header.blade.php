
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

    <title>后台管理系统</title>

    <link rel="stylesheet" href="/view/dist/vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/view/dist/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/view/dist/css/styles.css">
</head>

<body class="sidebar-fixed header-fixed">
@auth
<div class="page-wrapper">
    <nav class="navbar page-header">
        <a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
            <i class="fa fa-bars"></i>
        </a>

        <a class="navbar-brand" href="#">
            {{--<img src="/view/dist/imgs/logo.png" alt="logo">--}}
            <span><h1>饱了吗</h1></span>
        </a>

        <a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
            <i class="fa fa-bars"></i>
        </a>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-md-down-none">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-danger">5</span>
                </a>
            </li>

            <li class="nav-item d-md-down-none">
                <a href="#">
                    <i class="fa fa-envelope-open"></i>
                    <span class="badge badge-pill badge-danger">5</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="/view/dist/imgs/avatar-1.png" class="avatar avatar-sm" alt="logo">
                    {{--@guest--}}

                    <span class="small ml-1 d-md-down-none">{{Auth::user()->name}}</span>
                    {{--@endguest--}}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header">个人中心</div>

                    <a href="#" class="dropdown-item">
                        <i class="fa fa-user"></i>资料
                    </a>

                    <a href="#" class="dropdown-item">
                        <i class="fa fa-envelope"></i>信息
                    </a>

                    <div class="dropdown-header">设置</div>
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-bell"></i>通知
                    </a>

                    <a href="{{route('passwd')}}" class="dropdown-item">
                        <i class="fa fa-wrench"></i> 修改密码
                    </a>

                    <a href="{{route('logout')}}" class="dropdown-item">
                        <i class="fa fa-lock"></i>退出登录
                    </a>
                </div>
            </li>
        </ul>
    </nav>
@endauth