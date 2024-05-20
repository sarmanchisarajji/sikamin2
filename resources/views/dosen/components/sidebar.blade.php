<div class="sidebar" id="sidebar">
    <?php
            $currentRoute = request()->route()->getName();
        ?>
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="{{ ($currentRoute == 'd-dashboard') ? 'active' : '' }}">
                    <a href="{{ route('d-dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ ($currentRoute == 'd-mahasiswa_bimbingan' || $currentRoute == 'd-mahasiswa_penguji') ? 'active' : '' }}">
                    <a href="{{ route('d-mahasiswa_bimbingan') }}">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Mahasiswa</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>