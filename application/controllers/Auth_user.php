<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_user extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $cekSession = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        if ($cekSession != '') {
            redirect('dashboard');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() != false) {
            $this->_login();
        } else {
            $this->load->view('auth_user/template_header');
            $this->load->view('auth_user/login');
            $this->load->view('auth_user/template_footer');
        }
    }

    private function _login()
    {
        $cekSession = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        if ($cekSession != '') {
            redirect('dashboard');
        }
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $sysuser = $this->db->get_where('sysuser', ['email' => $email])->row_array();

        if ($sysuser) {
            if ($sysuser['status'] > 0) {
                if (password_verify($password, $sysuser['password'])) {
                    $data = [
                        'email' => $sysuser['email']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger py-1" role="alert">Wrong password!</div>');
                    redirect('auth_user');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger py-1" role="alert">Sorry! your account is not activated!</div>');
                redirect('auth_user');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger py-1" role="alert">Sorry! your email is not registered!</div>');
            redirect('auth_user');
        }
    }

    public function register()
    {
        $type = $this->input->post('type');
        // var_dump($type);
        $this->form_validation->set_rules('nama', 'Nama lengkap', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[sysuser.email]', [
            'is_unique' => 'Sorry, email has already registered!',
            'required' => 'Email belum di isi!'
        ]);
        $this->form_validation->set_rules('nip', 'nip', 'trim|required|is_unique[sysuser.nip]', [
            'is_unique' => 'Maaf, nip sudah terdaftar!',
            'required' => 'Nip belum di isi!'
        ]);
        if ($type == '' || $type == '') {
            $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]', [
                'min_legth' => 'Password must be longer than 6 characters',
                'matches'   => 'Password dont match!'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'trim|matches[password2]');
        } else {
            $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]', [
                'min_legth' => 'Password harus lebih dari 6 karakter!'
            ]);
        }
        $this->form_validation->set_rules('level_id', 'Level', 'trim|required', [
            'required' => 'Level belum terisi.'
        ]);

        if ($this->form_validation->run() == false) {
            // echo "Error";
            $data['title'] = 'Registration';
            // var_dump($data);
            if ($type == 'addUser') {
                $errlvl = form_error('level_id', '<small class="text-danger pl-2">', ' </small>');
                $erre = form_error('email', '<small class="text-danger pl-2">', ' </small>');
                $errpsw = form_error('password1', '<small class="text-danger pl-2">', ' </small>');
                $errnip = form_error('nip', '<small class="text-danger pl-2">', ' </small>');
                // $error = "<small class='text-danger pl-2'>Maaf, proses gagal. Anda memasukan data yang salah. </small>";
                $this->session->set_flashdata('message', $errlvl);
                $this->session->set_flashdata('message', $erre);
                $this->session->set_flashdata('message', $errpsw);
                $this->session->set_flashdata('message', $errnip);
                // $this->session->set_flashdata('message', $error);
                redirect('datauser');
            } else if ($type == 'addGuru') {
                $error = "<small class='text-danger pl-2'>Maaf, proses gagal. Anda memasukan data yang salah. </small>";
                $this->session->set_flashdata('message', $error);
                redirect('dataguru');
            } else {
                $this->load->view('auth_user/regist');
            }
        } else {
            // echo "oke";
            $email = $this->input->post('email', true);
            $new_date = date('Y-m-d');
            $level = $this->input->post('level_id');
            $data = [
                'nama'      => $this->input->post('nama'),
                'nip'       => $this->input->post('nip'),
                'jenis_kel' => $this->input->post('jenis_kel'),
                // 'tempat_lahir' => $this->input->post('tempat_lahir'),
                // 'alamat'    => $this->input->post('alamat'),
                'email'     => $email,
                'password'   => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'level_id'   => $level,
                'status'     => 1,
                'gambar'     => 'default.jpg',
                'tgl_dibuat' => $new_date
            ];

            $this->db->insert('sysuser', $data);
            if ($level == 3) {
                $ket = "Menambah data guru ";
            } else {
                $ket = "Menambah data user ";
            }
            $data1['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
            $nama = $data1['sysuser']['nama'];
            date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
            $jam = date('H:i:s');
            $tgl = date('Y-m-d');
            // echo '===================' . $nama;
            // die();
            $insertLog = "INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES (NULL, '" . $nama . "', '" . $jam . "', '" . $tgl . "', '" . $ket . "')";
            $this->db->query($insertLog);
            if ($type == 'addUser') {
                $this->session->set_flashdata('message', '<div class="alert alert-success py-1" role="alert">Data user berhasil ditambahkan.</div>');
                redirect('datauser');
            } else if ($type == 'addGuru') {
                $this->session->set_flashdata('message', '<div class="alert alert-success p-1" role="alert">Data guru berhasil ditambahkan.</div>');
                redirect('dataguru');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congrats! your account has been created.</div>');
                redirect('auth_user');
            }
        }
    }

    public function Logout()
    {
        // $this->session->sess_destroy();
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message', '<div class="alert alert-success py-1" role="alert">Anda telah logout.</div>');
        redirect('auth_user');
    }

    public function forgotPassword()
    {
        $data['title'] = 'Forgot Password';

        $this->form_validation->set_rules('email', 'Your Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth_user/template_header', $data);
            $this->load->view('auth_user/forgot_password', $data);
            $this->load->view('auth_user/template_footer');
        } else {
            $email = $this->input->post('email');
            $sysuser = $this->db->get_where('sysuser', ['email' => $email, 'status' => 1])->row_array();

            if ($sysuser) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email'            => $email,
                    'kode'            => $token,
                    'date_created'    => time()
                ];

                // $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success py-1" role="alert">Silahkan cek email anda untuk mereset password</div>');
                redirect('auth/forgotPassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger py-1" role="alert">Email yg anda masukan belum terdaftar</div>');
                redirect('auth/forgotPassword');
            }
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $sysuser = $this->db->get_where('sysuser', ['email' => $email])->row_array();

        if ($sysuser) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('auth_user/template_header', $data);
            $this->load->view('auth_user/change_password', $data);
            $this->load->view('auth_user/template_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('sysuser');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah! Silahkan login.</div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'         => 'smtp',
            'smtp_host'        => 'ssl://smtp.googlemail.com',
            'smtp_user'        => 'aryaherby29nov2k@gmail.com@gmail.com',
            'smtp_pass'        => 'Yusufaryadilla29',
            'smtp_port'        => 465,
            'mailtype'         => 'html',
            'charset'          => 'utf-8',
            'newline'          => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('wrbprog29@gmail.com', 'Web Programming YAD');
        $this->email->to($this->input->post('email'));

        if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"> Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    function settingPassword()
    {
        $data['title'] = "Setting Password";
        $data['active'] = 'U';

        $data['host'] = "http://$_SERVER[SERVER_NAME]:8080/absensi/assets/adminlte/";

        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['sysuser']['level_id'];

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim', [
            'required' => 'Password tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]', [
            'required' => 'Password harus diisi...'
        ]);

        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]', [
            'required' => 'Password harus diisi...'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_sys/header', $data);
            $this->load->view('templates_sys/sidebar', $data);
            $this->load->view('templates_sys/topbar', $data);
            $this->load->view('auth_user/ubah_password', $data);
            $this->load->view('templates_sys/footer');
        } else { // ketika berhasil
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            // cek password user yg telah ada di database
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current Password!</div>');
                redirect('settingPassword');
            } else { // Jika password benar kemudian
                // cek Password baru , tidak boleh sama dengan Password lama
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Current Password!</div>');
                    redirect('settingPassword');
                } else {
                    // Password sudah OK nih
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');


                    $nama = $data['sysuser']['nama'];
                    date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
                    $jam = date('H:i:s');
                    $tgl = date('Y-m-d');
                    $ket = "Mengubah Password";
                    // echo '===================' . $nama; die();
                    $insertLog = "INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES (NULL, '" . $nama . "', '" . $jam . "', '" . $tgl . "', '" . $ket . "')";
                    $this->db->query($insertLog);

                    // $success = $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password anda berhasil diubah.</div>');
                    redirect('berhasil_ubahPassword');
                }
            }
        }
    }

    function settingPassword_g()
    {
        $data['title'] = "Setting Password";
        $data['active'] = 'U';

        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi/assets/adminlte/";

        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['sysuser']['level_id'];

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim', [
            'required' => 'Password tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]', [
            'required' => 'Password harus diisi...'
        ]);

        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]', [
            'required' => 'Password harus diisi...'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_sys/header', $data);
            $this->load->view('templates_sys/sidebar2', $data);
            $this->load->view('templates_sys/topbar', $data);
            $this->load->view('auth_user/ubah_password', $data);
            $this->load->view('templates_sys/footer');
        } else { // ketika berhasil
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            // cek password user yg telah ada di database
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current Password!</div>');
                redirect('settingPassword_g');
            } else { // Jika password benar kemudian
                // cek Password baru , tidak boleh sama dengan Password lama
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Current Password!</div>');
                    redirect('settingPassword_g');
                } else {
                    // Password sudah OK nih
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    // $success = $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password anda berhasil diubah.</div>');
                    redirect('berhasil_ubahPassword');
                }
            }
        }
    }

    function cekUbahPassword()
    {
        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $currPass = $data['sysuser']['password'];
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password1');

        // cek password user yg telah ada di database
        if (!password_verify($current_password, $currPass)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current Password!</div>');
            redirect('settingPassword');
        } else { // Jika password benar kemudian
            // cek Password baru , tidak boleh sama dengan Password lama
            if ($current_password == $new_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Current Password!</div>');
                redirect('settingPassword');
            } else {
                // Password sudah OK nih
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('sysuser');

                $success = $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password anda berhasil diubah.</div>');
                if ($success != '') {
                    $data = array('status' => 'success', 'data' => $success);
                } else {
                    $data = array('status' => 'failed');
                }
                $ket = 'Mengubah Password';
                $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
                $nama = $data['sysuser']['nama'];
                date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
                $jam = date('H:i:s');
                $tgl = date('Y-m-d');
                $insertLog = "INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES (NULL, '" . $nama . "', '" . $jam . "', '" . $tgl . "', '" . $ket . "')";
                $this->db->query($insertLog);
                echo json_encode($data);
                // redirect('berhasil_ubahPassword');
            }
        }
    }
}
