<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sysuser extends CI_Controller
{
    // public function datauser()
    // {
    //     $session = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
    //     if ($session != '') {

    //         $data['title'] = 'Data User';

    //         $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
    //         $data['siswa'] = $this->User_model->getSiswa();
    //         $data['guru'] = $this->User_model->getGuru();
    //         $data['host'] = "http://$_SERVER[SERVER_NAME]:8080/absensi/assets/adminlte/";
    //         // var_dump($data['host']);
    //         // $data['mapel'] = $this->Mapel_model->getMapel();

    //         $this->load->view('templates_sys/header', $data);
    //         $this->load->view('/templates_sys/topbar');
    //         $this->load->view('/templates_sys/sidebar', $data);
    //         $this->load->view('administrator/datauser', $data);
    //         $this->load->view('/templates_sys/footer');
    //     } else {
    //         redirect('loginsys');
    //     }
    // }

    function getnamaGuru()
    {
        $nama = $this->input->post('nama');

        $qry = "SELECT m.id, m.hari_id, m.kode_mapel, m.pelajaran, m.jam_mulai, m.jam_selesai, s.nama AS nama_guru, h.hari, kls.kelas
        FROM mapel m
        JOIN sysuser s on s.kode=m.sysuser_id
        JOIN kelas kls on kls.id = m.kelas
        JOIN hari h on h.id=m.hari_id
        WHERE s.nama = '" . $nama . "'
        ORDER BY m.kelas, m.hari_id";
        $query = $this->db->query($qry);
        $res = $query->result();
        // print_r($res);
        echo json_encode($res);
    }
    function getAbs()
    {
        $kode = $this->input->post('kode_abs');
        $kls = $this->input->post('kls');

        if ($kls != '') {
            $addqry = "AND kls.kelas = '".$kls."'";
        } else {
            $addqry = '';
        }

        $qry = "SELECT k.*, s.nama AS nama_siswa, mg.nama AS mg_ke, s.nis, kls.kelas, s.jenis_kel, sys.nama AS guru, 
        m.pelajaran AS mapel FROM kehadiran k
        JOIN siswa s ON s.kode = k.siswa_id 
        JOIN kelas kls ON kls.id = s.kelas
        JOIN mapel m ON k.mapel_id = m.id
        JOIN sysuser sys ON m.sysuser_id = sys.kode
        JOIN kd_minggu mg ON k.kode = mg.kode
        WHERE k.kode = '" . $kode . "' ".$addqry."
        ORDER BY k.semester, k.kode, k.hari";
        // echo $qry;
        $query = $this->db->query($qry);
        $res = $query->result();
        echo json_encode($res);
    }

    function getkelas()
    {
        $kelas = $this->input->post('kelas');
        $qry = "SELECT S.*, kls.kelas AS kelass FROM siswa S
                JOIN kelas as kls ON kls.id = S.kelas
                WHERE kls.kelas = '".$kelas."'
                ORDER BY S.NAMA ASC";
        $result = $this->db->query($qry)->result();
        echo json_encode($result);
    }

    function log()
    {
        $session = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        if ($session != '') {
            $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
            // var_dump();
            $lvl_user = $data['sysuser']['level_id'];
            // echo $lvl_user; die();
            if ($lvl_user == 1) {
                $this->logAdmin();
            } else if ($lvl_user == 2) {
                $this->logStaff();
            } else {
                $this->logGuru();
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger py-1" role="alert">Anda belum login!</div>');
            redirect('loginadm');
        }
    }
    function logAdmin()
    {
        $data['title'] = 'Laporan Log Aktivitas';
        $data['active'] = '';

        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['sysuser']['level_id'];
        $data['siswa'] = $this->User_model->getSiswa();
        $data['guru'] = $this->User_model->getGuru();
        $data['host'] = "http://$_SERVER[SERVER_NAME]:8080/absensi/assets/adminlte/";
        
        $data['logInfo'] = $this->db->query("SELECT * FROM log_aktivitas ORDER BY id DESC")->result();

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar', $data);
        $this->load->view('administrator/laporan_log', $data);
        $this->load->view('/templates_sys/footer');
    }

    function logStaff()
    {
        $data['title'] = 'Laporan Log Aktivitas';
        $data['active'] = '';

        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['sysuser']['level_id'];
        $data['siswa'] = $this->User_model->getSiswa();
        $data['guru'] = $this->User_model->getGuru();
        $data['host'] = "http://$_SERVER[SERVER_NAME]:8080/absensi/assets/adminlte/";
        
        $data['logInfo'] = $this->db->query("SELECT * FROM log_aktivitas ORDER BY id DESC")->result();

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar1', $data);
        $this->load->view('administrator/laporan_log', $data);
        $this->load->view('/templates_sys/footer');
    }
    function logGuru()
    {
        $data['title'] = 'Laporan Log Aktivitas';
        $data['active'] = '';

        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['sysuser']['level_id'];
        $data['siswa'] = $this->User_model->getSiswa();
        $data['guru'] = $this->User_model->getGuru();
        $data['host'] = "http://$_SERVER[SERVER_NAME]:8080/absensi/assets/adminlte/";
        
        $data['logInfo'] = $this->db->query("SELECT * FROM log_aktivitas ORDER BY id DESC")->result();
        $data['mapel'] = $this->Mapel_model->getJadwalGuru();

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar2', $data);
        $this->load->view('guru/laporan_log', $data);
        $this->load->view('/templates_sys/footer');
    }
}
