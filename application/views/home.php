
<main class="px-0 mt-3">
    <div class="row px-4 justify-content-between" style="text-align: left;">
        <div class="col-lg-5 date p-3 shadow">
            <div class="row">
                <div class="col-lg-4 ms-5">
                    <h1 id="date"></h1>
                    <h1 id="month"></h1>
                    <h1 id="dateTime"></h1>
                </div>
                <div class="col-lg-5 ps-5">
                    <i style="font-size:77px;" class="bi bi-award-fill"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-6 ps-4 p-3 shadow" style="font-size: 15px;">
            <h5 class='shadow px-2'>Siswa Info</h5>
            <table class="table-sm text-white ms-1">
                <tr>
                    <td>Nama</td>
                    <td> &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; <?php echo $siswa['nama'] ?></td>
                </tr>
                <tr>
                    <td>Nis</td>
                    <td> &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; <?php echo $siswa['nis'] ?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td> &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; <?php echo $siswa['kelas'] . ' . '. $siswa['jurusan'] ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <?php
                    if ($siswa['status'] > 0) {
                        $status = 'Aktif';
                    } else {
                        $status = 'Tidak aktif';
                    }
                    ?>
                    <td> &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; &nbsp; <?php echo $status ?></td>
                </tr>
            </table>
        </div>

        <div class="row text-white">
            <?php echo $this->session->flashdata('message') ?>
            <table class="table table-sm text-white mt-3">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Hari</th>
                        <th>Pelajaran</th>
                        <th>Nama Guru</th>
                        <th>Jam Masuk</th>
                        <th>Batas Absen</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $hari_ini = $now;
                        foreach ($mapel as $m) :
                        date_default_timezone_set('Asia/Jakarta');
                        $date = Date('Y/m/d');
                        // jam saat ini
                        $jam_sekarang = date('H:i:s');
                        $batas = $m->batas_absen;
                        // echo $siswa['jurusan'] . ' | ';
                        // echo $m->jurusan;
                        $jam = $m->jam_mulai;
                        $mulai = substr($jam, 0, 5);
                        $batas = $m->batas_absen;
                        $batas_abs = substr($batas, 0, 5);

                        $kodeM = $m->kode_mapel;

                        if ($hari_ini == $m->hari and $siswa['jurusan'] == $m->jurusan || $m->jurusan == '') { ?>
                            <tr>
                                <td><?php echo $kodeM ?></td>
                                <td><?php echo $m->hari ?></td>
                                <td><?php echo $m->pelajaran ?> </td>
                                <td><?php echo $m->nama_guru ?></td>
                                <td> &emsp; <?php echo $mulai ?> </td>
                                <td> &emsp; <?php echo $batas_abs ?> </td>
                                <?php
                                $kode_absen = "SELECT * FROM absen";
                                $qryabs = $this->db->query($kode_absen)->row();
                                $kodeabs = $qryabs->kode_absen;
                                // echo $kodeabs . " kode | ";
                                $qrys = "SELECT * FROM siswa where no_absen = '" . $no_absen . "'";
                                $k = $this->db->query($qrys)->row();
                                $s_id = $k->kode;
                                // echo $s_id;
                                $kehadiran = "SELECT * FROM kehadiran where siswa_id = '" . $s_id . "' and kode = '" . $kodeabs . "' and mapel_id = '" . $m->id . "'";
                                $hadir = $this->db->query($kehadiran)->row_array();
                                // var_dump($hadir);
                                $kode = '';
                                if ($hadir) {
                                    $kode = $hadir['kode'];
                                    $mapel_id = $hadir['mapel_id'];
                                }
                                $s_id = '';
                                if ($hadir) {
                                    $s_id = $hadir['siswa_id'];
                                }
                                // echo $s_id;
                                // echo $jam_sekarang . $m->jam_mulai;
                                if ($hadir == '' and $jam_sekarang < $m->jam_selesai and $kode == '' and $s_id == '') { ?>
                                    <?php if ($hadir == '' and $jam_sekarang <= $m->batas_absen and $jam_sekarang >= $m->jam_mulai) { ?>
                                        <td onclick="getKdAbs(<?php echo $m->id; ?>, <?php echo $siswa['no_absen'] ?>)"><button class="btn btn-sm btn-danger">Absen</button></td>
                                    <?php } else if ($jam_sekarang <= $m->jam_mulai or $jam_sekarang >= $m->batas_absen) { ?>
                                        <td><button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#" disabled>Belum mulai</button></td>
                                    <?php } else { ?>
                                        <td><button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#">Absen ditutup</button></td>
                                    <?php } ?>
                                <?php } else if ($hadir != '' and $kode != '' and $mapel_id != "" and $s_id != '' and $m->id == $mapel_id and $jam_sekarang <= $m->jam_selesai) { ?>
                                    <td><button class="btn btn-sm btn-success">Sudah Absen</button></td>
                                <?php } else { ?>
                                    <td><button class="btn btn-sm btn-dark" disabled>Telah selesai</button></td>
                                <?php } ?>
                                <!-- <td onclick="getKdAbs(<?php echo $m->id; ?>, <?php echo $siswa['no_absen'] ?>)"><button class="btn btn-sm btn-danger">Absen</button></td> -->
                                <td></td>
                                
                            </tr>
                        <?php } ?>

                    <?php endforeach;
                    if ($hari_ini == 'Minggu') {
                        echo '<h1 style="background:red; margin-left:10px;">L I B U R</h1>';
                    }
                    ?>
                    

                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal" id="modal_abs" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Absen Mapel <i id="nmpl"></i></h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModal"></button>
            </div>
            <form action="" method="POST">
                <!-- <form action="<?php echo base_url('absen/masuk'); ?>" method="POST"> -->
                <div class="modal-body" style="text-align: left;">
                    <input type="hidden" name="mapel_id" id="mapel_id" class="form-control">
                    <h5>Absen Masuk ?</h5>
                    <!-- <div class="mt-2">
                        <label for="no_absen" class="form-label">No Absen</label>
                        <input type="text" name="abs" id="abs" class="form-control">
                    </div> -->
                    <!-- <div class="mt-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="......" autocomplete="off">
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" id="absMasuk" class="btn btn-primary">Masuk</button>
                </div>
            </form>
        </div>
    </div>
</div>