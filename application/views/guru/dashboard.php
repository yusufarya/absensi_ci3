<?php
if ($lvluser == 1) {
    $sysstatus = "Administrator";
} else if ($lvluser == 2) {
    $sysstatus = "Staff";
} else {
    $sysstatus = "Guru";
}
$qry = "SELECT * FROM siswa s
        JOIN kelas as k ON k.id = S.kelas
        ORDER BY tgl_dibuat DESC limit 3";
$query = $this->db->query($qry);
$res = $query->result();

$qry = "SELECT * FROM LOG_AKTIVITAS ORDER BY id DESC limit 4";
$query = $this->db->query($qry);
$log = $query->result();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $sysstatus  ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info" style="border-right: 5px solid cyan; border-top-left-radius: 20px;">
                        <div class="inner row">
                            <div class="col-md-3 pl-3 pt-0">
                                <h3 id="date"></h3>
                                <h1 id="month"></h1>
                                <h1 id="dateTime"></h1>
                            </div>
                            <div class="col">
                                <table class="table-sm" style="font-size: 14px;">
                                    <tr>
                                        <th>Nama</th>
                                        <td> &nbsp; :&nbsp; <?php echo $sysuser['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>NIP</th>
                                        <td> &nbsp; :&nbsp; <?php echo $sysuser['nip'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>TTL</th>
                                        <td> &nbsp; :&nbsp; <?php echo $sysuser['tempat_lahir'] . ', ' . $sysuser['tgl_lahir'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="icon" style="float: right;">
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success" style="border-right: 5px solid brown; border-top-left-radius: 20px;">
                        <div class="inner pl-3 pt-2">
                            <h3><?php echo count($guru) ?></h3>
                            <p>Jumlah Guru</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="#" class="small-box-footer"> <i class="fas "></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning" style="border-right: 5px solid green; border-top-left-radius: 20px;">
                        <div class="inner pl-3 pt-2">
                            <h3><?php echo count($siswa) ?></h3>
                            <p>Total Siswa</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        <a href="<?php echo base_url('daftarsiswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-8 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Siswa Terbaru
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <table class="table table-hover table-sm">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jenis</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Tanggal</th>
                                    </tr>
                                    <?php foreach ($res as $d) :
                                        // if ($d->level_id == 1) {
                                        //     $level = "Administrator";
                                        // } else if ($d->level_id == 2) {
                                        //     $level = "Staff";
                                        // } else {
                                        //     $level = "Guru";
                                        // }
                                    ?>
                                        <tr>
                                            <td><?= $d->nama ?></td>
                                            <td><?= $d->jenis_kel ?></td>
                                            <td><?= $d->kelas ?></td>
                                            <td><?= $d->jurusan ?></td>
                                            <td><?= $d->tgl_dibuat ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                Log aktivitas
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-hover table-sm">
                                <tr>
                                    <th>Nama</th>
                                    <th>Log Aktivitas</th>
                                    <th>Waktu - Tanggal</th>
                                </tr>
                                <?php foreach ($log as $l) : 
                                $jam = substr($l->jam, 0, 5);
                                ?>
                                    <tr>
                                        <td><?= $l->nama ?></td>
                                        <td><?= $l->keterangan ?></td>
                                        <td><?= $jam . " &nbsp; - &nbsp; " . $l->tanggal ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->

                <section class="col-lg-4 connectedSortable">
                    <!-- Map card -->
                    <div class="card bg-gradient-primary">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="ion ion-stats-bars mr-2"></i>
                                Jumlah Data Siswa
                            </h3>
                        </div>
                        <!-- /.card-body-->
                        <div class="card-body bg-transparent">
                            <div class="row">
                                <div class="col-6 text-center">
                                    <div id="sparkline-1" style="display: none;">
                                    </div>
                                    <i class="ion ion-male"></i>
                                    <?php
                                    $lk = $this->db->get_where('siswa', ['jenis_kel' => 'Laki-laki'])->num_rows();
                                    $lkcount = $lk;
                                    ?>
                                    <h4><?php echo $lkcount; ?></h4>
                                    <div class="text-white">Laki-laki</div>
                                </div>
                                <!-- ./col -->
                                <div class="col-6 text-center">
                                    <div id="sparkline-2" style="display: none;"></div>
                                    <i class="ion ion-female"></i>
                                    <?php
                                    $pr = $this->db->get_where('siswa', ['jenis_kel' => 'Perempuan'])->num_rows();
                                    $prcount = $pr; ?>
                                    <h4><?php echo $prcount; ?></h4>
                                    <div class="text-white">Perempuan</div>
                                </div>
                                <!-- ./col -->
                                <div class="col-4 text-center d-none">
                                    <div id="sparkline-3" style="display: none;"></div>
                                    <!-- <div class="text-white">Sales</div> -->
                                </div>
                                <!-- ./col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.card -->

                    <!-- Calendar -->
                    <div class="card bg-gradient-success">
                        <div class="card-header border-0">

                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                            </h3>
                            <!-- tools card -->
                            <div class="card-tools">
                                <!-- button with a dropdown -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a href="#" class="dropdown-item">Add new event</a>
                                        <a href="#" class="dropdown-item">Clear events</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">View calendar</a>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pt-0">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->