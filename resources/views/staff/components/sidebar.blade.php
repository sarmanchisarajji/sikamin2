<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="active">
                    <a href="{{ route('s-dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('s-mahasiswa-index') }}">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Mahasiswa</span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Dosen</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('s-dosen-index') }}">Data Dosen</a></li>
                        <li><a href="{{ route('s-m_dosen-index') }}">Monitoring Dosen</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-building"></i> <span> Ujian</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('s-m_proposal-index') }}">Monitoring Ujian</a></li>
                        <li><a href="add-department.html">Verifikasi Ujian</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>