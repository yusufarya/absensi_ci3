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
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card pb-3 pt-1 my-3">
        <div class="col-lg-6">
            <label for="kode" class="ml-1">Pilih guru</label>
            <select name="kode" id="kode" class="form-control">
                <option value="">Pilih nama guru</option>
                <?php foreach ($mapel as $d) : ?>
                    <option value="<?php echo $d->nama; ?>"><?php echo $d->nama; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php echo $this->session->flashdata('message') ?>
                <table class="table table-sm table-bordered">
                    <thead class="bg-dark">
                        <tr>
                            <th>Nama Guru</th>
                            <th>Kode</th>
                            <th>Hari</th>
                            <th>Pelajaran</th>
                            <th>Kelas</th>
                            <th>Jam Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="detail">
                        <!-- <?php foreach ($mapel as $m) : ?>
                            <tr>
                                <td><?php echo $m->nama_guru ?></td>
                                <td><?php echo $m->kode ?></td>
                                <td><?php echo $m->hari ?></td>
                                <td><?php echo $m->pelajaran ?></td>
                                <td><?php echo $m->jam_mulai ?></td>
                                <td>
                                    <a href=""><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?> -->
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->