<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    function siswaInfo() {
        $qry = "SELECT S.*, k.kelas as kelas FROM SISWA S 
                JOIN kelas as k ON k.id = S.kelas
                WHERE email = '".$this->session->userdata('email')."' ";
        $result = $this->db->query($qry)->row_array();
        return $result;
    }
    function getSiswa()
    {
        $qry = "SELECT * FROM `siswa`";

        $query = $this->db->query($qry);
        $return = $query->result();
        // var_dump($return);
        return $return;
    }

    function getSiswa1()
    {
        $qry = "SELECT * FROM `siswa`";

        $query = $this->db->query($qry);
        $return = $query->result();
        // var_dump($return);
        return $return;
    }

    function getGuru()
    {
        $qry = "SELECT * FROM sysuser WHERE level_id = 3";
        $query = $this->db->query($qry);
        $return = $query->result();
        // var_dump($return);
        return $return;
    }
    function getUser()
    {
        $qry = "SELECT sys.*, l.level FROM sysuser sys
                JOIN level l ON l.id = sys.level_id
                WHERE level_id <> 3";
        $query = $this->db->query($qry);
        $return = $query->result();
        // var_dump($return);
        return $return;
    }

    function getUserId($id)
    {
        $qry = "SELECT sys.*, l.level FROM sysuser sys
                JOIN level l ON l.id = sys.level_id
                WHERE sys.level_id <> 3 AND sys.kode = '" . $id . "'";
        $query = $this->db->query($qry);
        $return = $query->result();
        // var_dump($return);
        return $return;
    }

    function getGuruId($id)
    {
        $qry = "SELECT sys.*, l.level FROM sysuser sys
                JOIN level l ON l.id = sys.level_id
                WHERE sys.level_id = 3 AND sys.kode = '" . $id . "'";
        $query = $this->db->query($qry);
        $return = $query->result();
        // var_dump($return);
        return $return;
    }

    function getSiswaId($id)
    {
        $qry = "SELECT s.* FROM siswa s
                WHERE s.kode = '" . $id . "'";
        $query = $this->db->query($qry);
        $return = $query->result();
        // var_dump($return);
        return $return;
    }
}
