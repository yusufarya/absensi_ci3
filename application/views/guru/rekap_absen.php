<?php
if ($lvluser == 1) {
    $sysstatus = "Administrator";
} else if ($lvluser == 2) {
    $sysstatus = "Staff";
} else {
    $sysstatus = "Guru";
}
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
                        <li class="breadcrumb-item"><a href="#"><?php echo $title ?></a></li>
                        <li class="breadcrumb-item active"><?php echo $sysstatus ?></li>
                    </ol>
                </div><!-- /.col -->
                <hr>
            </div><!-- /.row -->
            <!-- <form onsubmit='window.open(" <?php echo base_url("guru/getRekapAbsen") ?>", "rpt" , " width=800,height=600" )' action="" method="post"> -->
            <form action="<?php echo base_url("guru/getRekapAbsen"); ?>" method="post">
                <div class="row mt-4">
                    <div class="col-lg-4 col-md-4 mt-3">
                        <label for="kode" class="ml-1">Minggu Ke?</label>
                        <select name="kode" id="kode" class="form-control">
                            <option value="">Pilih kode</option>
                            <?php foreach ($minggu as $mg) : ?>
                                <option value="<?php echo $mg->kode; ?>"><?php echo $mg->kode . " - " . $mg->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-3 mt-3">
                        <label for="kelas" class="ml-1">Kelas</label>
                        <select name="kelas" id="kelas" class="form-control">
                            <option value="">Pilih berdasarkan</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        <p class="errkls text-danger p-1"></p>
                    </div>
                    <div class="col-lg-7 col-md-7 mt-3">
                        <label for="kodes" class="ml-1">Semester</label>
                        <select name="kodes" id="kodes" class="form-control">
                            <option value="">Pilih berdasarkan</option>
                            <option value="1">01 - Semester Ganjil</option>
                            <option value="2">02 - Semester Genap</option>
                        </select>
                        <p class="errs text-danger p-1"></p>
                    </div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3 mt-1">
                        <label for="kelas" class="ml-3"></label><br>
                        <button class="btn btn-warning py-1 px-3" type="button" id="rekapAbsen">
                            <i class="ion ion-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->


    <!-- /.content -->
</div>
<!-- /.content-wrapper -->