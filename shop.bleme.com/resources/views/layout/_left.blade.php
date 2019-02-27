<!-- 左边菜单 -->
@auth
    <div class="main-container">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title">菜单栏</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="icon icon-speedometer"></i>商户管理中心
                        </a>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-target"></i>菜品分类管理<i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{route('menu_categorys.index')}}" class="nav-link">
                                    <i class="icon icon-target"></i>菜品分类列表
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('menu_categorys.create')}}" class="nav-link">
                                    <i class="icon icon-target"></i>添加菜品分类
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle">
                            <i class="icon icon-energy"></i>菜品管理<i class="fa fa-caret-left"></i>
                        </a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{route('menus.create')}}" class="nav-link">
                                    <i class="icon icon-energy"></i>添加菜品
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('menus.index')}}" class="nav-link">
                                    <i class="icon icon-energy"></i>菜品列表
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('activitys.index')}}" class="nav-link">
                            <i class="icon icon-puzzle"></i>查看活动
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="icon icon-grid"></i>
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