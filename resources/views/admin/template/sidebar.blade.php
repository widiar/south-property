<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('img/logo-white.png') }}" alt="Property Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.banner.index') }}"
                        class="nav-link{{request()->is('admin/banner*') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Data Banner
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.properties.index') }}"
                        class="nav-link{{request()->is('admin/properties*') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Data Property
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pesanan') }}"
                        class="nav-link{{request()->is('admin/pesanan*') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Pesanan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>