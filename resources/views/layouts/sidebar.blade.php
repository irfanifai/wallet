<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-WALLET</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-fw fa-home"></i>
        <span>MY-WALLET</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('deposit') }}">
        <i class="fas fa-fw fa-credit-card"></i>
        <span>Isi Saldo</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('transfer') }}">
        <i class="fas fa-fw fa-exchange-alt"></i>
        <span>Transfer</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('history') }}">
        <i class="fas fa-fw fa-history"></i>
        <span>History</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
