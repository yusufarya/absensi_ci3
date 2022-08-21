<main class="px-0 mt-3">
    <div class="row shadow py-3">
        <h3 class="mb-3">Jadwal Pelajaran</h3>
        <div class="col-lg-4" style="text-align: left;">
            <h5 class="ps-2 font-monospace fw-bolder text-dark py-2 px-4" style="background: #E0FFFF;">Senin</h5>
            <ul class="list-group" style="background-color: white !important;">
                <a href="#" class="text-decoration-none">
                    <li class="list-mapel">Upacara</li>
                    <?php $no = 1;
                    foreach ($mapel as $m) :
                        // print_r($m);
                        if ($m->hari == 'Senin' and $siswa['jurusan'] == $m->jurusan || $m->jurusan == '') {
                    ?>
                            <li class="list-mapel" onclick="getDtlMapel(<?php echo $m->id ?>)" style="background-color: dark;"><?php echo $m->pelajaran ?></li>
                    <?php }
                    endforeach; ?>
                </a>
            </ul>
        </div>
        <div class="col-lg-4" style="text-align: left;">
            <h5 class="ps-2 font-monospace fw-bolder text-dark py-2 px-4" style="background: #E0FFFF;">Selasa</h5>
            <?php $no = 1;
            foreach ($mapel as $m) :
                if ($m->hari == 'Selasa' and $siswa['jurusan'] == $m->jurusan || $m->jurusan == '') {
            ?>
                    <ul class="list-group" style="background-color: white !important;">
                        <a href="#" class="text-decoration-none">
                            <li class="list-mapel" onclick="getDtlMapel(<?php echo $m->id ?>)" style="background-color: dark;"><?php echo $m->pelajaran ?></li>
                        </a>
                    </ul>
            <?php }
            endforeach; ?>
        </div>
        <div class="col-lg-4" style="text-align: left;">
            <h5 class="ps-2 font-monospace fw-bolder text-dark py-2 px-4" style="background: #E0FFFF;">Rabu</h5>
            <?php $no = 1;
            foreach ($mapel as $m) :
                if ($m->hari == 'Rabu' and $siswa['jurusan'] == $m->jurusan || $m->jurusan == '') {
            ?>
                    <ul class="list-group" style="background-color: white !important;">
                        <a href="#" class="text-decoration-none">
                            <li class="list-mapel" onclick="getDtlMapel(<?php echo $m->id ?>)" style="background-color: dark;"><?php echo $m->pelajaran ?></li>
                        </a>
                    </ul>
            <?php }
            endforeach; ?>
        </div>
    </div>
    <div class="row mt-3 shadow py-3">
        <div class="col-lg-4" style="text-align: left;">
            <h5 class="ps-2 font-monospace fw-bolder text-dark py-2 px-4" style="background: #E0FFFF;">Kamis</h5>
            <?php $no = 1;
            foreach ($mapel as $m) :
                if ($m->hari == 'Kamis' and $siswa['jurusan'] == $m->jurusan || $m->jurusan == '') {
            ?>
                    <ul class="list-group" style="background-color: white !important;">
                        <a href="#" class="text-decoration-none">
                            <li class="list-mapel" onclick="getDtlMapel(<?php echo $m->id ?>)" style="background-color: dark;"><?php echo $m->pelajaran ?></li>
                        </a>
                    </ul>
            <?php }
            endforeach; ?>
        </div>
        <div class="col-lg-4" style="text-align: left;">
            <h5 class="ps-2 font-monospace fw-bolder text-dark py-2 px-4" style="background: #E0FFFF;">Jum`at</h5>
            <?php $no = 1;
            foreach ($mapel as $m) :
                if ($m->hari == 'Jumat' and $siswa['jurusan'] == $m->jurusan || $m->jurusan == '') {
            ?>
                    <ul class="list-group" style="background-color: white !important;">
                        <a href="#" class="text-decoration-none">
                            <li class="list-mapel" onclick="getDtlMapel(<?php echo $m->id ?>)" style="background-color: #F8F8FF;"><?php echo $m->pelajaran ?></li>
                        </a>
                    </ul>
            <?php }
            endforeach; ?>
        </div>
        <div class="col-lg-4" style="text-align: left;">
            <h5 class="ps-2 font-monospace fw-bolder text-dark py-2 px-4" style="background: #E0FFFF;">Sabtu</h5>
            <?php $no = 1;
            foreach ($mapel as $m) :
                if ($m->hari == 'Sabtu' and $siswa['jurusan'] == $m->jurusan || $m->jurusan == '') {
            ?>
                    <ul class="list-group" style="background-color: white !important;">
                        <a href="#" class="text-decoration-none">
                            <li class="list-mapel" onclick="getDtlMapel(<?php echo $m->id ?>)" style="background-color: dark;"><?php echo $m->pelajaran ?></li>
                        </a>
                    </ul>
            <?php }
            endforeach; ?>
        </div>
    </div>
    <br>
</main>