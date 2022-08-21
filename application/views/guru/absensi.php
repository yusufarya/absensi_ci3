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
            <div class="row pb-3 pt-1 my-3">
                <div class="col-lg-4">
                    <label for="kode_abs" class="ml-1">Minggu Ke?</label>
                    <input type="hidden" value="<?php echo $namaguru ?>" id="nama_guru">
                    <select name="kode_abs" id="kode_abs" class="form-control">
                        <option value="">--- Pilih ---</option>
                        <?php
                        $absenkd = $this->db->query("SELECT DISTINCT k.kode, kmg.nama FROM kehadiran k JOIN kd_minggu kmg ON kmg.kode=k.kode")->result();
                        foreach ($absenkd as $abs) : ?>
                            <option value="<?= $abs->kode ?>">- <?= $abs->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-lg-2">
                    <label for="kls" class="ml-1">Kelas</label>
                    <select name="kls" id="kls" class="form-control">
                        <option value="">-- Pilih Kelas --</option>
                        <?php
                        $kelas = $this->db->query("SELECT * FROM kelas")->result();
                        foreach ($kelas as $kls) : ?>
                            <option value="<?= $kls->kelas ?>"> <?= $kls->kelas ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-lg-1">
                    <label class="ml-2"></label>
                    <button $type="button" class="btn btn-primary mt-2" id="absClick">Lihat</button>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-3 mt-4 text-right" style="font-size: 14px;">
                    <b style="margin-bottom:0 !important;">✔️ Hadir &nbsp;</b>
                    <b style="margin-bottom:0 !important;">❌ Tidak Hadir &nbsp;</b>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <?php echo $this->session->flashdata('message') ?>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>Jenis Kelamin</th>
                            <th>Jam</th>
                            <th>Tanggal</th>
                            <th>Pelajaran</th>
                            <th>Status</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody id="detail">
                        <!-- <?php
                        $namaguru = $sysuser['nama'];
                        $no = 1;
                        foreach ($absensi as $abs) :
                            $dtguru = $abs->guru;
                            if ($namaguru == $dtguru) {
                        ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $abs->nama_siswa ?></td>
                                    <td><?php echo $abs->nis ?></td>
                                    <td><?php echo $abs->kelas ?></td>
                                    <td><?php echo $abs->jenis_kel ?></td>
                                    <td><?php echo $abs->jam ?></td>
                                    <td><?php echo $abs->tanggal ?></td>
                                    <td><?php echo $abs->mapel ?></td>
                                    <?php
                                    if ($abs->status == 'Y') {
                                        $status = 'Hadir';
                                    } else {
                                        $status = 'Tidak hadir';
                                    }
                                    ?>
                                    <td><?php echo $status ?></td>
                                    <td>
                                        <a href="<?php echo base_url('') . "/" . $abs->id ?>" class="btn btn-warning py-0">Edit</a>
                                    </td>
                                </tr>
                        <?php }
                        endforeach; ?> -->
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->