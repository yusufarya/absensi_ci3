<?php

use PhpParser\Node\Expr\Print_;

defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{
    function index()
    {
        $no_absen = $this->input->post('no_absen');
        // $nis = $this->input->post('nis');
        $password = $this->input->post('password');

        $siswa = $this->db->get_where('siswa', [
            'no_absen' => $no_absen
        ])->row_array();
        // var_dump($siswa);

        if ($siswa) {
            if ($siswa['status'] > 0) {
                if (password_verify($password, $siswa['password'])) {
                    $data = [
                        'no_absen' => $siswa['no_absen']
                    ];
                    $this->session->set_userdata($data);
                    redirect('absen/masuk');
                    // echo "oke";
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data anda tidak sesuai!</div>');
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sorry! your account is not activated!</div>');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf proses absen gagal</div>');
            redirect('home');
        }
    }

    function cekAbs()
    {
        $no_absen = $this->input->post('no_absen');
        $data['siswa'] = $this->User_model->siswaInfo();
        $noAbsSiswa = $data['siswa']['no_absen'];

        if ($no_absen == $noAbsSiswa) {
            $status = array('status' => 'success');
        } else {
            $status = array('status' => 'failed');
        }
        echo json_encode($status);
    }

    function masuk()
    {
        $data['siswa'] = $this->User_model->siswaInfo();
        $no_absen = $data['siswa']['no_absen'];
        // echo $no_absen;
        $qrys = "SELECT * FROM siswa where no_absen = '" . $no_absen . "'";
        $s = $this->db->query($qrys)->row();
        
        $hari_ini = $this->hari_ini(); 
        // echo $hari_ini;
        
        $jam_sekarang = date('H:i:s');
        $kode_absen = "SELECT * FROM absen";
        $qryabs = $this->db->query($kode_absen)->row();
        // var_dump($qryabs);
        // die();
        $kodeabs = $qryabs->kode_absen;
        $kd_semester = $qryabs->semester;
        // $qryhadir = "SELECT * FROM siswa where no_absen = '" . $no_absen . "'";
        // $kehadiran = $this->db->query($qryhadir)->row();
        $mapel = $this->input->post('mapel_id');
        // echo $mapel;
        // die();

        if ($no_absen != $s->no_absen) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf proses absen gagal</div>');
            redirect('home');
        } else {
            $data = [
                'kode' => $kodeabs,
                'semester' => $kd_semester,
                'siswa_id' => $s->kode,
                'jam' => $jam_sekarang,
                'tanggal' => date('Y-m-d'),
                'status' => 'Y',
                'keterangan' => 'Hadir',
                'mapel_id' => $mapel,
                'hari' => $hari_ini,
            ];
            // print_r($data);
            // die();
            $this->db->insert('kehadiran', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success py-2" role="alert">Berhasil, Anda telah absen</div>');
            redirect('home');
        }
    }

    function hari_ini(){
        date_default_timezone_set('Asia/Jakarta');
        $hari = date ("D");
     
        switch($hari){
            case 'Sun':
                $hari_ini = "Minggu";
            break;
     
            case 'Mon':			
                $hari_ini = "Senin";
            break;
     
            case 'Tue':
                $hari_ini = "Selasa";
            break;
     
            case 'Wed':
                $hari_ini = "Rabu";
            break;
     
            case 'Thu':
                $hari_ini = "Kamis";
            break;
     
            case 'Fri':
                $hari_ini = "Jumat";
            break;
     
            case 'Sat':
                $hari_ini = "Sabtu";
            break;
            
            default:
                $hari_ini = "Tidak di ketahui";		
            break;
        }

        return $hari_ini;
     
        // return "<b>" . $hari_ini . "</b>";
     
    }
}
