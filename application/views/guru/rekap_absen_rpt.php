<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<div class="content-wrapper" onload='window.open("", "rpt" , " width=180,height=650" )'>
    <style>
        section {
            padding: 8px 20px;
        }
        h1,
        h3 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        table {
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 3px 7px;
        }
    </style>
    <!-- Main content -->
    <section class="content">
        <button style="background-color: #DAA520; width: 52px; height:58px; border: 0px solid #DAA520; border-radius:9px;" data-title="PRINT" onclick="cetakRkp()">
            <img src="<?php echo base_url('assets/icon/printer.svg') ?>" alt="PRINT" width="38" style="display: block;">
            <p style="display: inline; font-family: 'Courier New', Courier, monospace; font-weight: 600; font-size: 13;">Print</p>
            <!-- <i class="bi bi-printer" style="width: 50px; height:50px; "></i> -->
        </button>

        <div style="float: right; text-align:left; font-size: 12px; margin-right:18px;">
            <p style="margin-bottom: -8px !important;">✔️ &nbsp; Hadir</p> 
            <p style="margin-bottom: -8px !important;">❌ &nbsp; Tidak Hadir</p> 
            <p style="margin-bottom: -8px !important;">Kode&nbsp;=&nbsp;Kode Pertemuan</p>
        </div>

        <div class="cetak">
            <br>
            <h1>Laporan Rekap Absensi</h1>
            <?php if (count($rekapData)) {
                $no = 'Semester' . $rekapData[0]->semester;
            } else {
                $no = '';
            }
            // print_r($this->session->all_userdata());
            ?>
            <h3><?php echo $no ?> </h3>
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <table style="margin: 20px auto 0;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>NIS</th>
                                <th>Kelas</th>
                                <th>Jenis Kelamin</th>
                                <th>Jam</th>
                                <th>Tanggal</th>
                                <th>Pelajaran</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($rekapData as $data) { 
                                if($data->guru == $sysuser['nama']){
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data->kode ?></td>
                                    <td><?php echo $data->nama_siswa ?></td>
                                    <td><?php echo $data->nis ?></td>
                                    <td><?php echo $data->kelas ?></td>
                                    <td><?php echo $data->jenis_kel ?></td>
                                    <?php if ($data->status == 'Y') { ?>
                                        <td><?php echo substr($data->jam, 0 ,5) ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($data->tanggal)) ?></td>
                                    <?php } else { ?>
                                        <td colspan="1" style="text-align:center; font-size: 12.5px; color:red;">  </td>
                                        <td colspan="1" style="text-align:center; font-size: 12.5px; color:red;">  </td>
                                    <?php } 
                                    if ($data->status == 'Y') {
                                        $status = '✔️';
                                    } else {
                                        $status = '❌';
                                    }
                                    ?> 
                                    
                                    <td><?php echo $data->mapel ?></td>
                                    <td style="text-align:center;"><?php echo $status ?></td>
                                </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    function cetakRkp() {
        // alert('ok')
        var isi = document.querySelector('.cetak');
        var htmlToPrint = '' +
            '<style type="text/css">' +
            'h1, h3 {' +
            'font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;' +
            'padding: 0;' +
            'margin: 0;' +
            'text-align: center;' +
            '}' +
            'table {' +
            'margin: 10px auto 0;' +
            'border-collapse: collapse;' +
            'margin-top: 20px;' +
            '}' +
            'table, td, th {' +
            'border: 1px solid black;' +
            'padding: 3px 7px;' +
            '}' +
            '</style>';

        // var htmlToPrint = '' +
        //     '<style type="text/css">' +
        //     'table th, table td {' +
        //     'border:1px solid #000;' +
        //     'padding;0.5em;' +
        //     '}' +
        //     '</style>';

        console.log(htmlToPrint);
        htmlToPrint += isi.innerHTML;
        newWin = window.open("");
        // newWin.document.write("<h3 align='center'>Print Page</h3>");
        newWin.document.write(htmlToPrint);
        newWin.print();
        newWin.close();
        // window.print()
    }
</script>