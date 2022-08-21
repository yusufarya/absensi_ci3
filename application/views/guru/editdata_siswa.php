<?php
if ($siswa[0]->status == 1) {
    $status = "Aktif";
} else {
    $status = "Tidak Aktif";
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="ml-2"><?php echo $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo $title ?></a></li>
                        <li class="breadcrumb-item active">Guru</li>
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
            <form method="POST" action="<?php echo base_url('guru/updateDataSiswa/') ?><?php echo $siswa[0]->id ?>">
                <div class="row py-2">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="type" value="siswa">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $siswa[0]->id ?>">
                            <label for="nama" class="ml-1">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $siswa[0]->nama ?>">
                        </div>
                        <div class="form-group">
                            <label for="nis" class="ml-1">NIS</label>
                            <input type="text" class="form-control" id="nis" name="nis" value="<?php echo $siswa[0]->nis ?>">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir" class="ml-1">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $siswa[0]->tempat_lahir ?>">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir" class="ml-1">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $siswa[0]->tgl_lahir; ?>">
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="ml-1">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $siswa[0]->alamat ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-5 ml-2">
                        <div class="form-group">
                            <label for="absen" class="ml-1">No Absen</label>
                            <?php if($siswa[0]->no_absen == 0){ 
                                $siswaD = $this->db->query('SELECT no_absen FROM siswa ORDER BY no_absen DESC limit 1')->result();
                                $no = $siswaD[0]->no_absen;
                                ?>
                                <input readonly type="text" class="form-control" id="absen" name="absen" value="<?php echo $no+1 ?>">
                                <?php } else { ?>
                                    <input readonly type="text" class="form-control" id="absen" name="absen" value="<?php echo $siswa[0]->no_absen ?>">
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="jurusan" class="ml-1">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $siswa[0]->jurusan ?>">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kel" class="ml-1">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jenis_kel" name="jenis_kel" value="<?php echo $siswa[0]->jenis_kel ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email" class="ml-1">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $siswa[0]->email ?>" autocomplete="off" readonly>
                        </div>
                        <div class="form-group">
                            <label for="status" class="ml-1">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="<?php echo $siswa[0]->status ?>">
                                    <<&nbsp; <?php echo $status ?> &nbsp;>>
                                </option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak aktif</option>
                            </select>
                        </div>

                    </div>
                </div>
                <a href="<?php echo base_url('daftarsiswa')  ?>" class="btn btn-dark"> <i class="fa fa-chevron-left"></i> Kembali</a>
                <a onclick="return confirm('Yakin ingin menghapus data ?')" href="<?php echo base_url('hapusSiswa') . "/" . $siswa[0]->id ?>" class="btn btn-danger"> <i class="fa fa-trash"></i> Hapus</a>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-share-square" aria-hidden="true"></i> Simpan</button>
            </form>
            <br>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->