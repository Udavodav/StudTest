
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">StudTest</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <span class="brand-text font-weight-light text-white">{{Auth::user()->name}}</span>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Тесты
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.test.index_all')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Все доступные</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.test.index_my')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Мои</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.group.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Группы
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{ route('admin.result.index') }} class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Результаты
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
