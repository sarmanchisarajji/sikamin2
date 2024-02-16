<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="menu-item {{ request()->is('mahasiswa/dashboard') ? 'active' : '' }}">
                    <a href="/mahasiswa/dashboard" class="menu-link fw-bolder">
                        <i class="feather-grid"></i>
                        <span> Dashboard</span>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('mahasiswa/pengajuan-ujian*') ? 'active' : '' }}">
                    <a href="/mahasiswa/pengajuan-ujian" class="menu-link fw-bolder">
                        <i class="fas fa-graduation-cap"></i>
                        <span> Pengajuan Ujian</span>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('mahasiswa/monitoring-ujian') ? 'active' : '' }}">
                    <a href="/mahasiswa/monitoring-ujian" class="menu-link fw-bolder">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span> Monitoring Ujian</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
