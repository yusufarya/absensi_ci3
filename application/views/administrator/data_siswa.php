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
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mt-2 py-1" data-toggle="modal" data-target="#tambahSiswa">
                        Tambah Data Siswa
                    </button>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo $title ?></a></li>
                        <li class="breadcrumb-item active"><?php echo $sysstatus ?></li>
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
                <?php echo $this->session->flashdata('message') ?>
                <table class="table table-bordered table-sm">
                    <thead class="bg-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <!-- <th>Level</th> -->
                            <th>Jenis Kelamin</th>
                            <th>TTL</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($siswa as $s) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $s->nama ?></td>
                                <td><?php echo $s->nis ?></td>
                                <!-- <td><?php echo $s->level ?></td> -->
                                <td><?php echo $s->jenis_kel ?></td>
                                <td><?php echo $s->tempat_lahir . ", " . $s->tgl_lahir ?></td>
                                <td><?php echo $s->alamat ?></td>
                                <?php if ($s->status == 1) {
                                    $status = '<div class="badge bg-success p-1 px-4 text-center">Aktif</div>';
                                } else {
                                    $status = '<div class="badge bg-danger py-1 px-2 text-center">Tidak Aktif</div>';
                                }
                                ?>
                                <td><?php echo $status ?></td>
                                <td>
                                    <a href="<?php echo base_url('editdatasiswa') . "/" . $s->kode ?>" class="btn btn-warning py-0">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="tambahSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('auth/register') ?>" method="post">
                <div class="modal-body">
                    <div class="px-3">
                        <div class="mb-2">
                            <input type="hidden" class="form-control" name="type" id="type" value="addSiswa">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama lengkap">
                            <?= form_error('nama', '<small class="text-danger pl-2">', ' </small>'); ?>
                        </div>
                        <div class="mb-2">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="text" class="form-control" name="nis" id="nis" placeholder="nis">
                            <?= form_error('nis', '<small class="text-danger pl-2">', ' </small>'); ?>
                        </div>
                        <div class="mb-2">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" class="form-control" name="kelas" id="kelas" placeholder="kelas">
                            <?= form_error('kelas', '<small class="text-danger pl-2">', ' </small>'); ?>
                        </div>
                        <div class="mb-2">
                            <label for="jenis_kel" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kel" id="jenis_kel" class="form-control">
                                <option value="">Pilik jenis kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <!-- <input type="text" class="form-control" name="jenis_kel" id="jenis_kel" placeholder="jenis_kel"> -->
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="youremail@gmail.com">
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password1" id="password1" placeholder="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>