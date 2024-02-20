<div class="sidebar" id="sidebar">
    <?php
    // Tentukan route yang sedang aktif
        $currentRoute = request()->route()->getName();
    ?>
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="{{ ($currentRoute == 's-dashboard') ? 'active' : '' }}">
                    <a href="{{ route('s-dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ ($currentRoute == 's-mahasiswa-index') ? 'active' : '' }}">
                    <a href="{{ route('s-mahasiswa-index') }}">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Mahasiswa</span>
                    </a>
                </li>
                <li
                    class="submenu {{ ($currentRoute == 's-dosen-index' || $currentRoute == 's-m_dosen-index') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Dosen</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li
                            style="background-color:  {{ ($currentRoute == 's-dosen-index') ? '#3d5ee1' : '' }}; border-radius: 5px;">
                            <a href="{{ route('s-dosen-index') }}"
                                class="{{ ($currentRoute == 's-dosen-index') ? 'text-white' : '' }}">Data Dosen</a>
                        </li>
                        <li
                            style="background-color:  {{ ($currentRoute == 's-m_dosen-index') ? '#3d5ee1' : '' }}; border-radius: 5px">
                            <a href="{{ route('s-m_dosen-index') }}"
                                class="{{ ($currentRoute == 's-m_dosen-index') ? 'text-white' : '' }}">Monitoring
                                Dosen</a>
                        </li>
                    </ul>
                </li>
                <li
                    class="submenu {{ ($currentRoute == 's-m_proposal-index' || $currentRoute == 's-v_proposal-index') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-building"></i> <span> Ujian</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li
                            style="background-color:  {{ ($currentRoute == 's-m_proposal-index') ? '#3d5ee1' : '' }}; border-radius: 5px;">
                            <a href="{{ route('s-m_proposal-index') }}"
                                class="{{ ($currentRoute == 's-m_proposal-index') ? 'text-white' : '' }}">Monitoring
                                Ujian</a>
                        </li>
                        <li
                            style="background-color:  {{ ($currentRoute == 's-v_proposal-index') ? '#3d5ee1' : '' }}; border-radius: 5px;">
                            <a href="{{ route('s-v_proposal-index') }}"
                                class="{{ ($currentRoute == 's-v_proposal-index') ? 'text-white' : '' }}">Verifikasi
                                Ujian</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>