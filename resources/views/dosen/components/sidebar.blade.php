<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class="submenu active">
                    <a href="{{ route('dosen.dashboard') }}"><i class="feather-grid"></i> <span> Dosen Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-graduation-cap"></i> <span> Students</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="students.html">Student List</a></li>
                        <li><a href="student-details.html">Student View</a></li>
                        <li><a href="add-student.html">Student Add</a></li>
                        <li><a href="edit-student.html">Student Edit</a></li>
                        <li><a href="{{ route('dosen.mahasiswa_bimbingan.list') }}">Mahasiswa Bimbingan</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Teachers</span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('dosen.mahasiswa_bimbingan.list') }}">Teacher List</a></li>
                        <li><a href="teacher-details.html">Teacher View</a></li>
                        <li><a href="add-teacher.html">Teacher Add</a></li>
                        <li><a href="edit-teacher.html">Teacher Edit</a></li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>Management</span>
                </li>
                <li>
                    <a href="holiday.html"><i class="fas fa-holly-berry"></i> <span>Holiday</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
