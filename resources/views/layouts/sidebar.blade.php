<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html" style="background-color: black;">
        <div class="sidebar-brand-icon rotate-n-12">
            <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GAS Admin <sup></sup></div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('homes') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Gestion des Publications</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Gerer Utilisateurs</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('reserve') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Gestion des Reservations</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('visits') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Gestion des Visits</span></a>
    </li>

    @if (auth()->user()->level == 'Admin')
        <li class="nav-item">
            <a class="nav-link" href="/category">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Category</span></a>
        </li>
    @endif


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <!--<div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>Gestion immobilieres</strong> Groupe ATAKORA Sarl!</p>
        <a class="btn btn-success btn-sm" href="#" >Upgrade to Pro!</a>
    </div>-->

</ul>
