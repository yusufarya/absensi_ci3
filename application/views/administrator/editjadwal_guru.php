<?php 

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="ml-2">Edit <?php echo $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo $title ?></a></li>
                        <li class="breadcrumb-item active">Administrator</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ml-2">
            <!-- Small boxes (Stat box) -->
            <form method="POST" action="<?php echo base_url('user/updatejadwalGuru/') ?><?php echo $guru[0]->id ?>">
                <div class="row py-2">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="type" value="guru">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $guru[0]->id ?>">
                            <label for="nama" class="ml-1">Nama Guru</label>
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $guru[0]->id ?>">
                            <input type="text" readonly class="form-control" id="nama" name="nama" value="<?php echo $guru[0]->nama_guru ?>">
                        </div>
                        <div class="form-group">
                            <label for="jam_masuk" class="ml-1">Jam Masuk</label>
                            <input type="text" class="form-control" id="jam_masuk" name="jam_masuk" value="<?php echo $guru[0]->jam_mulai ?>">
                        </div>
                        <div class="form-group">
                            <label for="batas_absen" class="ml-1">Batas Absen</label>
                            <input type="text" class="form-control" id="batas_absen" name="batas_absen" value="<?php echo $guru[0]->batas_absen ?>">
                        </div>
                        <div class="form-group">
                            <label for="jam_selesai" class="ml-1">Jam Selesai</label>
                            <input type="text" class="form-control" id="jam_selesai" name="jam_selesai" value="<?php echo $guru[0]->jam_selesai ?>">
                        </div> 
                    </div> 
                </div>
                <a href="<?php echo base_url('jadwalGuru') ?>" class="btn btn-dark"> <i class="fa fa-chevron-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-share-square" aria-hidden="true"></i> Simpan</button>
            </form>
            <br>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->