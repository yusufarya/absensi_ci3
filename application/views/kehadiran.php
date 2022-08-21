<main class="px-3 mt-3">

    <div class="row mt-2 shadow justify-content-center">
        <p class="display-6 text-center mt-2">Riwayat Kehadiran</p>
        <div class="col-lg-10">
            <table class="table table-hover mt-2 mx-2">
                <tr class="text-white">
                    <!-- <th>No</th> -->
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Mapel</th>
                    <th>Jam Absen</th>
                    <th>Pertemuan</th>
                    <th>Semester</th>
                </tr>
                <?php
                $no = 1;
                // echo "<pre>";
                // print_r($siswa);
                // // print_r($kehadiran);
                // echo "</pre>";
                foreach ($kehadiran as $k) :
                    if ($k->status == 'Y') {
                        $status = 'Hadir';
                    } else {
                        $status = 'Tidak Hadir';
                    }
                    if ($k->semester == '1') {
                        $semester = 'Ganjil';
                    } else {
                        $semester = 'Genap';
                    }
                    if ($siswa['kode'] == $k->siswa_id) { ?>
                        <tr class="text-white">
                            <!-- <td><?php echo $no++ ?></td> -->
                            <td><?php echo $k->nama_siswa ?></td>
                            <td><?php echo $status ?></td>
                            <td><?php echo $k->mapel ?></td>
                            <td><?php echo $k->jam ?></td>
                            <td><?php echo $k->mg_ke ?></td>
                            <td><?php echo $semester ?></td>
                        </tr>
                <?php }
                endforeach; ?>
            </table>
        </div>
    </div>

</main>