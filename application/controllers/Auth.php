    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Auth extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();

            $this->load->library(['ion_auth', 'form_validation']);
            $this->load->model('model_user');
        }

        public function index()
        {
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Login';
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/login');
                $this->load->view('templates/auth_footer');
            } else {
                $this->_login();
            }
        }

        private function _login()
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            //jika usernya ada



            //jika usernya active 
            if ($user) {
                if ($user['is_active'] == 1) {
                    //cek password
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        $this->load->model('model_user');

                        $hasil = $this->model_user->cek_user($data);
                        if ($hasil->num_rows() == 1) {
                            foreach ($hasil->result() as $sess) {
                                $sess_data['logged_in'] = 'Sudah Loggin';
                                // $sess_data['uid'] = $sess->uid;
                                $sess_data['email'] = $sess->email;
                                $sess_data['role_id'] = $sess->role_id;
                                $this->session->set_userdata($sess_data);
                            }
                        }

                        if ($this->session->userdata('role_id') == '1') {
                            redirect('beranda');
                        } elseif ($this->session->userdata('role_id') == '2') {
                            redirect('blog');
                        } elseif ($this->session->userdata('role_id') == '3') {
                            redirect('beranda_puskesmas');
                        }
                    } else {
                        echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
                    }
                }
            }
        }


        public function registration()
        {
            $this->form_validation->set_rules('name', 'Name', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]', [
                'is_unique' => "Email ini sudah dipakai!"
            ]);
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[password2]', [
                'matches' => "Password tidak sama!",
                'min_length' => "Password terlalu pendek!"
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Buat Akun';
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/registration');
                $this->load->view('templates/auth_footer');
            } else {
                $data = [
                    'name' => htmlspecialchars($this->input->post('name', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'image' => 'default.jpg',
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role_id' => 2,
                    'is_active' => 1,
                    'date_created' => time()
                ];

                $this->db->insert('user', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Selamat! Akun anda telah dibuat. Silahkan masuk. </div>');
                redirect('auth');
            }
        }

        public function logout()
        {
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('role_id');
            session_destroy();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah keluar!</div>');
            redirect('auth');
        }
    }

  

// class Auth extends CI_Controller
// {

//     public function index()
//     {
//         $this->load->view('auth/header');
//         $this->load->view('auth/login');
//         $this->load->view('auth/footer');
//     }

//     public function cek_login()
//     {
//         $data = array(
//             'email' => $this->input->post('email', TRUE),
//             'password' => md5($this->input->post('password', TRUE))
//         );
//         $this->load->model('model_user'); // load model_user
//         $hasil = $this->Model_user->cek_user($data);
//         if ($hasil->num_rows() == 1) {

//             foreach ($hasil->result() as $sess) {
//                 $sess_data['logged_in'] = 'Sudah Loggin';
//                 $sess_data['uid'] = $sess->uid;
//                 $sess_data['username'] = $sess->username;
//                 $sess_data['level'] = $sess->level;
//                 $this->session->set_userdata($sess_data);
//             }
             
                        
//             if ($this->session->userdata('user_role') == '1') {
//                 redirect('beranda');
//             } elseif ($this->session->userdata('user_role') == '2') {
//                 redirect('blog');
//             } elseif ($this->session->userdata('user_role') == '3') {
//                 redirect('beranda_puskesmas');
//             }
//         } else {
//             echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
//         }
//     }
// }
