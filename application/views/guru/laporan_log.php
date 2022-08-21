<?php
if ($lvluser == 1) {
    $sysstatus = "Administrator";
} else if ($lvluser == 2) {
    $sysstatus = "Staff";
} else {
    $sysstatus = "Guru";
}
$namaguru = $sysuser['nama'];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo $title ?></h1><hr>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo $title ?></a></li>
                        <li class="breadcrumb-item active"><?php echo $sysstatus ?></li>
                    </ol>
                </div><!-- /.col -->
                <hr>
            </div><!-- /.row --> 
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row mx-2">
                <table class="table table-hover table-sm">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Log Aktivitas</th>
                        <th>Waktu - Tanggal</th>
                    </tr>
                    <?php  $no = 1;
                    foreach ($logInfo as $l) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $l->nama ?></td>
                            <td><?= $l->keterangan ?></td>
                            <td><?= $l->jam . " - " . $l->tanggal ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->