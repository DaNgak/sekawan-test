<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route("dashboard.index") }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <em class="fas fa-laugh-wink"></em>
        </div>
        <div class="sidebar-brand-text mx-3">Perusahaan X</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route("dashboard.index") }}">
            <em class="fas fa-fw fa-tachometer-alt"></em>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <em class="fas fa-fw fa-folder"></em>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> --}}

    <!-- Nav Item - Charts -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <em class="fas fa-fw fa-chart-area"></em>
            <span>Charts</span>
        </a>
    </li> --}}

    <!-- Nav Item - Tables -->

    <div class="sidebar-heading">
        Data
    </div>

    <!-- Nav Item - Table -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <em class="fas fa-fw fa-table"></em>
            <span>Tabel Data</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List Tabel Data</h6>
                @if (auth()->user()->role === "admin")
                    <a class="collapse-item" href="{{ route("transport.index") }}">Data Kendaraan</a>
                    <a class="collapse-item" href="{{ route("order.index") }}">Data Sewa (Ongoing)</a>
                    <a class="collapse-item" href="{{ route("order.finish.index") }}">Data Sewa (Finish)</a>
                @else
                    <a class="collapse-item" href="{{ route("transport.boss.index") }}">Data Kendaraan</a>
                    <a class="collapse-item" href="{{ route("order.boss.index") }}">Data Sewa (Ongoing)</a>
                    <a class="collapse-item" href="{{ route("order.finish.index") }}">Data Sewa (Finish)</a>
                @endif
            </div>
        </div>
    </li>
    <!-- Nav Item - Trash Data -->
    {{-- <div class="sidebar-heading">
        Sampah
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapsePagesTrash"
            aria-expanded="true" aria-controls="collapsePagesTrash">
            <em class="fas fa-fw fa-table"></em>
            <span>Tabel Sampah</span>
        </a>
        <div id="collapsePagesTrash" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List Tabel Sampah</h6>
                <a class="collapse-item" href="{{ route("rooms.trash.index") }}">Data Kamar</a>
                <a class="collapse-item" href="{{ route("dormitory.trash.index") }}">Data Penghuni</a>
                <a class="collapse-item" href="{{ route("transactions.trash.index") }}">Data Transaksi</a>
                <a class="collapse-item" href="{{ route("users.trash.index") }}">Data User</a>
            </div>
        </div>
    </li> --}}


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider">


</ul>
<!-- End of Sidebar -->