<div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
    <a href="{{ url('/') }}" class="navbar-brand sidebar-gone-hide">PERPUSTAKAAN UPT 8</a>
    <div class="navbar-nav">
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
    </div>
    <div class="nav-collapse">
    </div>
    <form class="form-inline ml-auto">
        {{-- <ul class="navbar-nav">
            <li>
                <a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a>
            </li>
        </ul> --}}
    </form>
    <ul class="navbar-nav navbar-right">
     
        @guest
            <a href="/login" class="navbar-brand">Login</a>
        @else
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">

            <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            </li>
            
        @endguest
        
    </ul>
    </nav>