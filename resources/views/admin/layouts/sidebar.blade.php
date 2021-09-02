<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <i class="fas fa-home"></i>
        <span class="brand-text font-weight-light">Home</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{route('admin.index')}}" class="d-block">Admin panel</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{route('car.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           Cars
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('pickpoint.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Pickpoints
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('user.index.managers')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Managers
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('user.index.clients')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Clients
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
