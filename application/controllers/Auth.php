<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $cekSession = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row_array();
        if ($cekSession != '') {
            redirect('home');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() != false) {
            $this->_login();
        } else {
            $this->load->view('auth/login');
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $siswa = $this->db->get_where('siswa', ['email' => $email])->row_array();
        // print_r(password_verify($password, $siswa['password'])); die();
        if ($siswa) {
            if ($siswa['status'] > 0) {
                if (password_verify($password, $siswa['password'])) {
                    $data = [
                        'email' => $siswa['email']
                    ];
                    $this->session->set_userdata($data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger py-1" role="alert">Email atau password salah.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger py-1" role="alert">Maaf, akun anda tidak aktif!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger py-1" role="alert">Maaf, email anda belum terdaftar!</div>');
            redirect('auth');
        }
    }

    public function register()
    {
        $type = $this->input->post('type');
        $this->form_validation->set_rules('nama', 'Nama lengkap', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[siswa.email]', [
            'is_unique' => 'Maaf, email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('nis', 'NIS', 'trim|required|is_unique[siswa.nis]', [
            'is_unique' => 'Maaf, nis telah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]', [
            'min_legth' => 'Password must be longer than 6 characters'
        ]);
        if ($type != 'addSiswa' and $type != 'addSiswa_g') {
            $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]', [
                'min_legth' => 'Password must be longer than 6 characters',
                'matches'   => 'Password dont match!'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'trim|matches[password2]');
        }

        if ($this->form_validation->run() == false) {
            // var_dump($data);
            if ($type == 'addSiswa') {
                $errnis = form_error('nis', '<small class="text-danger pl-2">', ' </small>');
                $this->session->set_flashdata('message', $errnis);
                redirect('datasiswa');
            } else if ($type == 'addSiswa_g') {
                $errnis = form_error('nis', '<small class="text-danger pl-2">', ' </small>');
                // $erremail = form_error('email', '<small class="text-danger pl-2">', ' </small>');
                $this->session->set_flashdata('message1', '<small class="text-danger pl-2">Proses gagal</small>');
                $this->session->set_flashdata('message', $errnis);
                // $this->session->set_flashdata('message', $erremail);
                redirect('daftarsiswa');
            } else {
                $this->load->view('auth/regist');
            }
        } else {
            // echo "oke"; die();
            $email = $this->input->post('email', true);
            $new_date = date('Y-m-d');
            var_dump($new_date);
            $data = [
                'nama'      => $this->input->post('nama'),
                'nis'       => $this->input->post('nis'),
                'kelas'     => $this->input->post('kelas'),
                'jenis_kel' => $this->input->post('jenis_kel'),
                // 'tempat_lahir' => $this->input->post('tempat_lahir'),
                // 'tgl_lahir' => $this->input->post('tgl_lahir'),
                // 'alamat'    => $this->input->post('alamat'),
                'email'     => $email,
                // 'username'   => $this->input->post('username'),
                'password'   => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'status'     => 0,
                'gambar'     => 'default.jpg',
                'tgl_dibuat' => $new_date
            ];

            $data1['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
            $nama = $data1['sysuser']['nama'];
            date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
            $jam = date('H:i:s');
            $tgl = date('Y-m-d');
            $ket = 'Menambah data siswa';
            // echo '===================' . $nama;
            // die();
            $insertLog = "INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES (NULL, '" . $nama . "', '" . $jam . "', '" . $tgl . "', '" . $ket . "')";
            $this->db->query($insertLog);

            $this->db->insert('siswa', $data);
            if ($type == 'addSiswa') {
                $this->session->set_flashdata('message', '<div class="alert alert-success py-1" role="alert">Selamat. 1 Data siswa berhasil ditambahkan!</div>');
                redirect('datasiswa');
            } else if ($type == 'addSiswa_g') {
                $this->session->set_flashdata('message', '<div class="alert alert-success py-1" role="alert">Selamat. 1 Data siswa berhasil ditambahkan!</div>');
                redirect('daftarsiswa');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success py-1" role="alert">Selamat. 1 Data siswa berhasil ditambahkan!</div>');
                redirect('daftarsiswa');
                // redirect('auth');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congrats! your account has been created.</div>');
            }
        }
    }
    public function Logout()
    {
        // $this->session->sess_destroy();
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message', '<div class="alert alert-success py-1" role="alert">Anda telah logout.</div>');
        redirect('auth');
    }
}
