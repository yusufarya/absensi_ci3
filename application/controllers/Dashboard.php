<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function index()
    {
        $session = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        if ($session != '') {
            $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
            // var_dump();
            $lvl_user = $data['sysuser']['level_id'];
            if ($lvl_user == 1) {
                $this->administrator();
            } else if ($lvl_user == 2) {
                $this->staff();
            } else {
                $this->guru();
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger py-1" role="alert">Anda belum login!</div>');
            redirect('loginadm');
        }
    }
    function administrator()
    {
        $data['title'] = 'Dashboard';
        $data['active'] = '';

        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['sysuser']['level_id'];
        $data['siswa'] = $this->User_model->getSiswa();
        $data['guru'] = $this->User_model->getGuru();
        $data['host'] = "http://$_SERVER[SERVER_NAME]:8080/absensi/assets/adminlte/";
        // var_dump($data['host']);
        // $data['mapel'] = $this->Mapel_model->getdataMapel();

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar', $data);
        $this->load->view('administrator/dashboard', $data);
        $this->load->view('/templates_sys/footer');
    }

    function staff()
    {
        $data['title'] = 'Dashboard';
        $data['active'] = '';

        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['sysuser']['level_id'];
        $data['siswa'] = $this->User_model->getSiswa();
        $data['guru'] = $this->User_model->getGuru();
        $data['host'] = "http://$_SERVER[SERVER_NAME]:8080/absensi/assets/adminlte/";
        // var_dump($data['host']);
        // $data['mapel'] = $this->Mapel_model->getdataMapel();

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar1', $data);
        $this->load->view('administrator/dashboard', $data);
        $this->load->view('/templates_sys/footer');
    }
    function guru()
    {
        $data['title'] = 'Dashboard';
        $data['active'] = '';

        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['sysuser']['level_id'];
        $data['siswa'] = $this->User_model->getSiswa();
        $data['guru'] = $this->User_model->getGuru();
        $data['host'] = "http://$_SERVER[SERVER_NAME]:8080/absensi/assets/adminlte/";
        // var_dump($data['host']);
        // $data['mapel'] = $this->Mapel_model->getdataMapel();
        $data['mapel'] = $this->Mapel_model->getJadwalGuru();

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar2', $data);
        $this->load->view('guru/dashboard', $data);
        $this->load->view('/templates_sys/footer');
    }
}
