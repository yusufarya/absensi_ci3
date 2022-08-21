<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Kehadiran_model extends CI_Model
{

    function getDataAbsen()
    {
        // $qry = "SELECT k.*, s.nama AS nama_siswa, s.nis, s.kelas, s.jenis_kel
        //         FROM kehadiran k
        //         JOIN siswa s ON s.kode = k.siswa_id
        //         ORDER BY k.kode, k.hari";
        $qry = "SELECT k.*, s.nama AS nama_siswa, mg.nama AS mg_ke, s.nis, s.kelas, s.jenis_kel, sys.nama AS guru, m.pelajaran AS mapel
                FROM kehadiran k
                JOIN siswa s ON s.kode = k.siswa_id
                JOIN mapel m ON k.mapel_id = m.id
                JOIN sysuser sys ON m.sysuser_id = sys.kode
                JOIN kd_minggu mg ON k.kode = mg.kode
                ORDER BY k.semester, k.kode, k.hari";
        $query = $this->db->query($qry);
        $return = $query->result();
        // var_dump($return);
        return $return;
    }

    function getRecapReport($minggu_ke, $semester, $kelas)
    {
        // echo $minggu_ke . ' | ' . $semester . ' | ' . $kelas . ' <br> ';
        if ($minggu_ke == '') {
            $qrkode = '';
        } else {
            $qrkode = ' AND k.kode = ' . $minggu_ke;
        }
        if ($kelas == '') {
            $qrkls = '';
        } else {
            $qrkls = ' AND kls.kelas = ' . $kelas;
        }
        if ($semester > 0) {
            $qrs = 'WHERE k.semester = ' . $semester;
        } else {
            $qrs = '';
        }
        $qry = "SELECT k.*, s.nama AS nama_siswa, s.nis, kls.kelas, s.jenis_kel, sys.nama AS guru, m.pelajaran AS mapel
                FROM kehadiran k
                JOIN siswa s ON s.kode = k.siswa_id
                JOIN mapel m ON k.mapel_id = m.id
                JOIN kelas kls ON kls.id = s.kelas 
                JOIN sysuser sys ON m.sysuser_id = sys.kode
                " . $qrkode . " " . $qrs . " " . $qrkls . "
                ORDER BY k.kode, k.hari";
        $query = $this->db->query($qry);
        $result = $query->result();

        return $result;
    }

    function getMinggu()
    {
        $qry = "SELECT * FROM kd_minggu";
        $query = $this->db->query($qry);
        $result = $query->result();
        return $result;
    }

    function UpLapAbs($idSiswa, $kode, $semester, $id_m, $hari) {
        $insert = "INSERT INTO `kehadiran` (`id`, `siswa_id`, `kode`, `semester`, `jam`, `tanggal`, `status`, `keterangan`, `mapel_id`, `hari`) VALUES (NULL, '".$idSiswa."', '".$kode."', '".$semester."', 'NULL', 'NULL', 'N', 'Tidak Hadir', '".$id_m."', '".$hari."')";
        $query = $this->db->query($insert);
        // $result = $query->result();
        return true;
    }
}
