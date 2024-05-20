<div class="header">
    <div class="header-left">
        <a href="index.html" class="logo">
            <img src="{{ asset('') }}assets/img/logo.svg" alt="Logo" width="100" height="100">
        </a>
        <a href="index.html" class="logo logo-small">
            <img src="{{ asset('') }}assets/img/logo-small.svg" alt="Logo" width="30" height="30">
        </a>
    </div>
    <div class="menu-toggle">
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fas fa-bars"></i>
        </a>
    </div>

    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>

    <ul class="nav user-menu">
        <li class="nav-item dropdown has-arrow new-user-menus">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    @if (Auth::user()->foto == null)
                    <img class="rounded-circle" src="{{ asset('assets\img\profile.png')  }}" width="31"
                        alt="{{ Auth::user()->nama_pengguna }}">
                    @else
                    <img class="rounded-circle" src="{{ asset('storage/' . Auth::user()->foto) }}" width="31"
                        alt="{{ Auth::user()->nama_pengguna }}">
                    @endif
                    <div class="user-text">
                        <h6>{{ Auth::user()->nama_pengguna }}</h6>
                        <p class="text-muted mb-0">{{ Str::ucfirst(Auth::user()->user_type) }}</p>
                    </div>
                </span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ url(Auth::user()->user_type . '/profil') }}">My Profile</a>
                <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
            </div>
        </li>
    </ul>
</div>