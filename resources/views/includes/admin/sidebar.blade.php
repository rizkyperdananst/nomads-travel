<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-text mx-3">
            NOMADS ADMIN
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Paket Travel -->
    <li class="nav-item {{ Request::is('admin/travel-package*') ? 'active' : '' }}">
        <a class="nav-link pb-0" href="{{ route('travel-package.index') }}">
            <i class="fas fa-fw fa-hotel"></i>
            <span>Paket Travel</span></a>
    </li>

    <!-- Nav Item - Gallery Travel -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="{{ route('gallery.index') }}">
            <i class="fas fa-fw fa-images"></i>
            <span>Gallery Travel</span></a>
    </li>

    <!-- Nav Item - Transaksi -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="{{ route('transaction.index') }}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Transaksi</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>