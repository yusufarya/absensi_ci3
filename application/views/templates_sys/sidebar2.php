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
                    <a href="#" onclick="jadwalGuru()" class="nav-link <?php echo $title == 'Jadwal Guru' ? 'active' : '' ?>">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Jadwal
                            <!-- <span class="badge badge-inf`o right">2</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('daftarsiswa') ?>" class="nav-link <?php echo $title == 'Data Siswa' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Data Siswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('setAbsen') ?>" class="nav-link <?php echo $title == 'Setting Absensi' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-qrcode"></i>
                        <!-- <i class="nav-icon fas fa-code-commit"></i> -->
                        <p>Set Absensi</p>
                    </a>
                </li>

                <li class="nav-item <?php echo $active == 'Mguru' ? 'menu-open bg-active' : '' ?>">
                    <a href="#" class="nav-link <?php echo $active == 'Mguru' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Laporan Kehadiran
                            <i class="fas fa-angle-left right"></i>
                            <!-- <span class="badge badge-info right">6</span> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ml-2">
                            <a href="<?php echo base_url('absensi') ?>" class="nav-link <?php echo $title == 'Absensi' ? 'bg' : '' ?>">
                                <p>
                                    Absensi
                                    <!-- <span class="badge badge-inf`o right">2</span> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ml-2">
                            <a href="<?php echo base_url('rekapAbsen') ?>" class="nav-link <?php echo $title == 'Laporan Rekap Absen' ? 'bg' : '' ?>">
                                <p>Rekap Absensi</p>
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
                            <a href="<?php echo base_url('settingpassword-g') ?>" class="nav-link <?php echo $title == 'Setting Password' ? ' bg' : '' ?>">
                                <p>Setting Password</p>
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
<!-- 
<button type="button" style="display:none;" class="btn btn-primary mt-2 py-1" data-toggle="modal">
    Tambah Data Siswa
</button> -->

<div class="modal" tabindex="-1" id="tampilJadwal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Jadwal Mengajar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mx-2">
                    <table class="table table-sm table-bordered">
                        <thead class="bg-dark">
                            <tr>
                                <th>Nama Guru</th>
                                <th>Kode</th>
                                <th>Pelajaran</th>
                                <th>Hari</th>
                                <th>Dari Jam</th>
                                <th>Sampai Jam</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($mapel as $m) :
                                if ($m->kelas != '') {
                                    $kls = $m->kelas;
                                    if($kls == 1) {
                                        $kls = '10';
                                    } else if ($kls == 2) {
                                        $kls = '11';
                                    } else if($kls == 3) {
                                        $kls = '12';
                                    }
                                } else {
                                    $kls = '';
                                }
                                if ($sysuser['nama'] == $m->nama_guru) {
                            ?>
                                    <tr>
                                        <td><?php echo $m->nama_guru ?></td>
                                        <td><?php echo $m->kode_mapel ?></td>
                                        <td><?php echo $m->pelajaran ?></td>
                                        <td><?php echo $m->hari ?></td>
                                        <td><?php echo substr($m->jam_mulai, 0, 5) ?></td>
                                        <td><?php echo substr($m->jam_selesai, 0, 5) ?></td>
                                        <td><?php echo $kls ?></td>
                                    </tr>
                            <?php }
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function jadwalGuru() {
        var jadwal = $('#tampilJadwal')
        bootbox.confirm('Ingin melihat jadwal guru ?', function(res) {
            if (res) {
                // $('#tampilJadwal').show()
                jadwal.show()
                // $('.modal').addClass('fade');
                $('#closeModal').on('click', function() {
                    jadwal.hide()
                })
            }
        })
    }
</script>