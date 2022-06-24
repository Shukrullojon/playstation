<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item {{ Request::is('admin*') ? 'menu-open':''}}">
                <a href="#" class="nav-link {{ Request::is('admin*') ? 'active':''}}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route("adminIndex") }}" class="nav-link {{ Request::is('admin') ? "active" : "" }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard v1</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ Request::is('product*') ? 'menu-open':''}}">
                <a href="#" class="nav-link {{ Request::is('product*') ? 'active':''}}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Product
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route("product.index") }}" class="nav-link {{ Request::is('product*') ? "active" : "" }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Product</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ Request::is('user*') || Request::is('role*') || Request::is('permission*') ? 'menu-open':''}}">
                <a href="#" class="nav-link {{ Request::is('user*') || Request::is('role*') || Request::is('permission*') ? 'active':''}}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        User Management
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route("user.index") }}" class="nav-link {{ Request::is('user*') ? "active" : "" }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("role.index") }}" class="nav-link {{ Request::is('role*') ? "active" : "" }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Role</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route("permission.index") }}" class="nav-link {{ Request::is('permission*') ? "active" : "" }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Permission</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
