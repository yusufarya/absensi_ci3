<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="<?php echo $host ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Absensi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('assets/img/') . $sysuser['gambar'] ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $sysuser['nama']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="<?php echo base_url('dashboard') ?>" class="nav-link <?php echo $title == 'Dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <!-- <i class="right fas fa-angle-left"></i> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('jadwalGuru') ?>" class="nav-link <?php echo $title == 'Jadwal Guru' ? 'active' : '' ?>">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Jadwal Guru
                            <!-- <span class="badge badge-inf`o right">2</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item <?php echo $active == 'MUser' ? 'menu-open bg-active' : '' ?>">
                    <a href="#" class="nav-link <?php echo $active == 'MUser' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Manajemen User
                            <i class="fas fa-angle-left right"></i>
                            <!-- <span class="badge badge-info right">6</span> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-2">
                            <a href="<?php echo base_url('/datauser') ?>" class="nav-link <?php echo $title == 'Data User' ? 'bg' : '' ?>">
                                <p>Data User</p>
                            </a>
                        </li>
                        <li class="nav-item ml-2">
                            <a href="<?php echo base_url('/dataguru') ?>" class="nav-link <?php echo $title == 'Data Guru' ? 'bg' : '' ?>">
                                <p>Data Guru</p>
                            </a>
                        </li>
                        <li class="nav-item ml-2">
                            <a href="<?php echo base_url('/datasiswa') ?>" class="nav-link <?php echo $title == 'Data Siswa' ? 'bg' : '' ?>">
                                <p>Data Siswa</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php echo $active == 'U' ? 'menu-open bg-active' : '' ?>">
                    <a href="#" class="nav-link <?php echo $active == 'U' ? 'active' : '' ?>">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Utility
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item ml-2">
                            <a href="<?php echo base_url('settingpassword') ?>" class="nav-link <?php echo $title == 'Setting Password' ? ' bg' : '' ?>">
                                <p>Setting Password</p>
                            </a>
                        </li>
                        <li class="nav-item ml-2">
                            <a href="pages/examples/blank.html" class="nav-link">
                                <p>Setting Default</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Additional</li>
                <li class="nav-item">
                    <a href="<?= base_url('logreport') ?>" class="nav-link <?php echo $title == 'Laporan Log Aktivitas' ? 'active' : '' ?>">
                        <i class="nav-icon fa fa-list-ul"></i>
                        <p>Log Aktivitas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="logout()">
                        <i class="nav-icon fa fa-share-square"></i>
                        <p>
                            Logout
                            <!-- <span class="badge badge-info right"></span> -->
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>