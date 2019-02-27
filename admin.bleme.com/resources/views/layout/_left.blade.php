<!-- 左边菜单 -->
@auth
    <div class="main-container">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title">菜单栏</li>
                    <li class="nav-item">
                        <a href="/view/dist/index.php" class="nav-link active">
                            <i class="icon icon-speedometer"></i>首页
                        </a>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-target"></i>管理员中心<i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{route('admins.index')}}" class="nav-link">
                                    <i class="icon icon-target"></i>管理员列表
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('admins.create')}}" class="nav-link">
                                    <i class="icon icon-target"></i>添加管理员
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-energy"></i>商家分类管理<i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{route('shop_categorys.index')}}" class="nav-link">
                                    <i class="icon icon-energy"></i>分类列表
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('shop_categorys.create')}}" class="nav-link">
                                    <i class="icon icon-energy"></i>添加分类
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-graph"></i>商户资料管理<i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{ route('shops.index') }}" class="nav-link">
                                    <i class="icon icon-graph"></i>信息列表
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <i class="icon icon-graph"></i>账号列表
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('activitys.index') }}" class="nav-link">
                            <i class="icon icon-puzzle"></i>活动列表
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('activitys.create') }}" class="nav-link">
                            <i class="icon icon-grid"></i>添加活动
                        </a>
                    </li>

                    <li class="nav-title">More</li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-umbrella"></i> Pages <i class="fa fa-caret-left"></i>
                        </a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/view/dist/blank.php" class="nav-link">
                                    <i class="icon icon-umbrella"></i> Blank Page
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/view/dist/login.php" class="nav-link">
                                    <i class="icon icon-umbrella"></i> Login
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/view/dist/register.php" class="nav-link">
                                    <i class="icon icon-umbrella"></i> Register
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/view/dist/invoice.php" class="nav-link">
                                    <i class="icon icon-umbrella"></i> Invoice
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/view/dist/404.php" class="nav-link">
                                    <i class="icon icon-umbrella"></i> 404
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/view/dist/500.php" class="nav-link">
                                    <i class="icon icon-umbrella"></i> 500
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/view/dist/settings.php" class="nav-link">
                                    <i class="icon icon-umbrella"></i> 设置
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
@endauth