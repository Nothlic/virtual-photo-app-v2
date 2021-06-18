<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Youtube_model');
        $this->load->library('form_validation');
    }


    public function getData() {
        $data = $this->db->query('SELECT image FROM photobooth ORDER BY time DESC')->row_array();;
        echo json_encode($data);
    }

    public function index()
    {
        $data['title'] = 'Philips Virtual Gathering';
        $data['registration'] = "";
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('templates/auth_footer');
    }

    public function login()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }


        //trim
        $this->form_validation->set_rules('kodeUnik', 'Kode Unik', 'required|trim|strtoupper', ['required' => 'Kode E-Store Harap Diisi']);
        $this->form_validation->set_rules('phoneNumber', 'Nomor Handphone', 'required', ['required' => 'Nomor Handphone Harap Diisi']);



        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }

    public function loginGame()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }


        //trim
        $this->form_validation->set_rules('kodeUnik', 'Kode Unik', 'required|trim|strtoupper', ['required' => 'Kode E-Store Harap Diisi']);



        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/loginGame');
            $this->load->view('templates/auth_footer');
        } else {
            // validasinya success
            $this->_logingame();
        }
    }



    private function _login()
    {

        $kodeUnik = $this->input->post('kodeUnik');
        $phoneNumber = $this->input->post('phoneNumber');
        for ($z = 0; $z <= 10; $z++) {
            $kodeUnik = str_replace(' ', '', $kodeUnik);
        }


        $user = $this->db->get_where('user', ['kodeUnik' => $kodeUnik])->row_array();
        date_default_timezone_set('Asia/Jakarta');
        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if ($kodeUnik == $user['kodeUnik'] && $phoneNumber == $user['phoneNumber']) {
                    include('database_connection.php');
                    $query = "
                        SELECT login_details.user_id, user.email,user.kodeUnik FROM login_details 
                        INNER JOIN user
                        ON user.id = login_details.user_id 
                        WHERE login_details.last_activity > DATE_SUB(NOW(), INTERVAL 5 SECOND) AND user.kodeUnik = '$kodeUnik'
                        AND (user.role_id = '2' )
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $count = $statement->rowCount();
                    if ($count > 0) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">You already login in another device!</div>');
                        redirect('auth/login');
                    } else {

                        include('database_connection.php');
                        date_default_timezone_set('Asia/Jakarta');
                        $insert_query = "
                        INSERT INTO login_details (
                         user_id,logout_time ,last_activity) VALUES (
                         :user_id,:logout_time, :last_activity)
                        ";
                        $statement = $connect->prepare($insert_query);
                        $statement->execute(
                            array(
                                'user_id'  => $user["id"],
                                'logout_time' => date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa'))),
                                'last_activity' => date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa')))
                            )
                        );
                        $login_id = $connect->lastInsertId();
                        if (!empty($login_id)) {
                            $_SESSION["type"] = $row["user_type"];
                            $_SESSION["login_id"] = $login_id;
                        }

                        $data = [
                            'role_id' => $user['role_id'],
                            'kodeUnik' => $user['kodeUnik']
                        ];
                        $this->session->set_userdata($data);

                        if ($user['role_id'] == 1) {
                            redirect('admin');
                        } else if ($user['role_id'] == 3) {

                            redirect('user/mc');
                        } else if ($user['role_id'] == 4) {

                            redirect('produk');
                        } else if ($user['role_id'] == 5) {

                            redirect('user/ts');
                        } else if ($user['role_id'] == 6) {

                            redirect('user');
                        } else {

                            redirect('user');
                        }
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Tidak Valid!</div>');
                    redirect('auth/login');
                }
            } else if ($user['role_id'] == 2) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><small style="font-family:centraleregular">Mohon login kembali setelah kami mengirimkan informasi mengenai tanggal dan waktu acara.</small></div>');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal <br>Pastikan Data Yang Anda Masukkan Sudah Benar !</div>');
            redirect('auth/login');
        }
    }


    private function _logingame()
    {

        $kodeUnik = $this->input->post('kodeUnik');
        for ($z = 0; $z <= 10; $z++) {
            $kodeUnik = str_replace(' ', '', $kodeUnik);
        }


        $user = $this->db->get_where('user', ['kodeUnik' => $kodeUnik])->row_array();
        date_default_timezone_set('Asia/Jakarta');
        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if ($kodeUnik == $user['kodeUnik']) {
                    include('database_connection.php');
                    $query = "
                        SELECT login_details.user_id, user.email, user.image FROM login_details 
                        INNER JOIN user
                        ON user.id = login_details.user_id 
                        WHERE login_details.last_activity > DATE_SUB(NOW(), INTERVAL 5 SECOND) AND user.kodeUnik = '$kodeUnik'
                        AND (user.role_id = '2' )
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $count = $statement->rowCount();
                    if ($count > 0) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">You already login in another device!</div>');
                        redirect('auth/login');
                    } else {

                        include('database_connection.php');
                        date_default_timezone_set('Asia/Jakarta');
                        $insert_query = "
                        INSERT INTO login_details_game (
                         user_id,logout_time ,last_activity) VALUES (
                         :user_id,:logout_time, :last_activity)
                        ";
                        $statement = $connect->prepare($insert_query);
                        $statement->execute(
                            array(
                                'user_id'  => $user["id"],
                                'logout_time' => date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa'))),
                                'last_activity' => date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa')))
                            )
                        );
                        $login_id = $connect->lastInsertId();
                        if (!empty($login_id)) {
                            $_SESSION["type"] = $row["user_type"];
                            $_SESSION["login_id"] = $login_id;
                        }

                        $data = [
                            'role_id' => $user['role_id'],
                            'kodeUnik' => $user['kodeUnik']
                        ];
                        $this->session->set_userdata($data);

                        if ($user['role_id'] == 1) {
                            redirect('admin');
                        } else if ($user['role_id'] == 3) {

                            redirect('user/mc');
                        } else if ($user['role_id'] == 4) {

                            redirect('produk');
                        } else if ($user['role_id'] == 5) {

                            redirect('user/ts');
                        } else if ($user['role_id'] == 6) {

                            redirect('user');
                        } else {

                            redirect('user');
                        }
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Harap Diisi!</div>');
                    redirect('auth/login');
                }
            } else if ($user['role_id'] == 2) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><small style="font-family:centraleregular">Mohon login kembali setelah kami mengirimkan informasi mengenai tanggal dan waktu acara.</small></div>');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal <br>Pastikan Data Yang Anda Masukkan Sudah Benar !</div>');
            redirect('auth/login');
        }
    }


    public function registrasi()
    {

        $data['provinsi'] = $this->User_model->getAllProvinsi();

        $this->form_validation->set_rules('name', 'name', 'required', ['required' => 'Nama Harap Diisi']);
        $this->form_validation->set_rules('regional', 'regional', 'required', ['required' => 'Regional Harap Diisi']);
        $this->form_validation->set_rules('jenisUser', 'jenisUser', 'required', ['required' => 'Regional Harap Diisi']);
        $this->form_validation->set_rules('nameCompany', 'nameCompany', 'required', ['required' => 'Nama Toko Harap Diisi']);
        $this->form_validation->set_rules('phoneNumber', 'phoneNumber', 'required', ['required' => 'Nomor Handphone Harap Diisi']);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Philips Virtual Gathering Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registrasi', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $name = $this->input->post('name', true);
            $regional = $this->input->post('regional', true);
            $jenisUser = $this->input->post('jenisUser', true);
            $nameCompany = $this->input->post('nameCompany', true);
            $email = $this->input->post('email', true);
            $phoneNumber = $this->input->post('phoneNumber', true);
            $phoneNumber = trim($phoneNumber, ' ');

            $phoneNumber = str_replace('+62', '0', $phoneNumber);
            for ($z = 0; $z <= 10; $z++) {
                $phoneNumber = str_replace(' ', '', $phoneNumber);
            }



            $user = $this->db->get_where('user', ['phoneNumber' => $phoneNumber])->row_array();
            if ($user['phoneNumber'] == $phoneNumber) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal <br>Nomor Handphone Anda Sudah Terdaftar !</div>');
                redirect('auth/registrasi');
            } else {
                $data = [
                    'name' => $name,
                    'regional' => $regional,
                    'jenisUser' => $jenisUser,
                    'nameCompany' => htmlspecialchars($nameCompany),
                    'email' => $email,
                    'phoneNumber' => $phoneNumber,
                    'role_id' => 2,
                    'is_active' => 1,
                    'date_created' => time(),
                ];


                $this->db->insert('user', $data);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Sudah Terdaftar !</div>');
                redirect('auth/login');
            }
        }
    }



    public function pertanyaan1()
    {
        $this->form_validation->set_rules('answer', 'Jawaban', 'required', ['required' => 'Jawaban Harap Diisi']);
        $this->form_validation->set_rules('idPesertaGame', 'Kode Unik', 'required', ['required' => 'Kode Unik Harap Diisi']);


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Philips Virtual Gathering';
            $data['registration'] = "";
            $data['user'] = $this->db->get_where('game', ['noHp' => $this->session->userdata('noHp')])->row_array();

            $this->load->view('templates/auth_header', $data);
            $this->load->view('game/q1', $data);
            $this->load->view('templates/auth_footer');
        } else {

            $idPesertaGame = $this->input->post('idPesertaGame', true);
            $answer = $this->input->post('answer', true);
            $data = [
                'idPesertaGame' => $idPesertaGame,
                'answer' => $answer,
            ];

            $cek = $this->db->query("SELECT COUNT(*) as count FROM `pertanyaan1` WHERE idPesertaGame ='".$idPesertaGame."' ")->row_array();
            if($cek['count'] < 1){
                $this->db->insert('pertanyaan1', $data);
                redirect('auth/pertanyaan2');
            }else{
                redirect('auth/pertanyaan2');
            }
            
        }
    }


    public function pertanyaan2()
    {
        $this->form_validation->set_rules('answer', 'Jawaban', 'required', ['required' => 'Jawaban Harap Diisi']);
        $this->form_validation->set_rules('idPesertaGame', 'Kode Unik', 'required', ['required' => 'Kode Unik Harap Diisi']);


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Philips Virtual Gathering';

            $data['user'] = $this->db->get_where('game', ['noHp' => $this->session->userdata('noHp')])->row_array();
            $this->load->view('templates/auth_header', $data);
            $this->load->view('game/q2', $data);
            $this->load->view('templates/auth_footer');
        } else {

            $idPesertaGame = $this->input->post('idPesertaGame', true);
            $answer = $this->input->post('answer', true);

            
            $data = [
                'idPesertaGame' => $idPesertaGame,
                'answer' => $answer,
            ];


            
            $cek = $this->db->query("SELECT COUNT(*) as count FROM `pertanyaan2` WHERE idPesertaGame ='".$idPesertaGame."' ")->row_array();
            if($cek['count'] < 1){
            
                $this->db->insert('pertanyaan2', $data);
                redirect('auth/pertanyaan3');
            }else{
                redirect('auth/pertanyaan3');
            }

        }
    }

    public function pertanyaan3()
    {
        $this->form_validation->set_rules('answer', 'Jawaban', 'required', ['required' => 'Jawaban Harap Diisi']);
        $this->form_validation->set_rules('idPesertaGame', 'Kode Unik', 'required', ['required' => 'Kode Unik Harap Diisi']);


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Philips Virtual Gathering';

            $data['user'] = $this->db->get_where('game', ['noHp' => $this->session->userdata('noHp')])->row_array();
            $this->load->view('templates/auth_header', $data);
            $this->load->view('game/q3', $data);
            $this->load->view('templates/auth_footer');
        } else {

            $idPesertaGame = $this->input->post('idPesertaGame', true);

            $answer = $this->input->post('answer', true);
            $data = [
                'idPesertaGame' => $idPesertaGame,
                'answer' => $answer,
            ];


            $cek = $this->db->query("SELECT COUNT(*) as count FROM `pertanyaan3` WHERE idPesertaGame ='".$idPesertaGame."' ")->row_array();
            if($cek['count'] < 1){
            
                $this->db->insert('pertanyaan3', $data);
                redirect('auth/pertanyaan4');
            }else{
                redirect('auth/pertanyaan4');
            }

        }
    }

    public function pertanyaan4()
    {
        $this->form_validation->set_rules('answer', 'Jawaban', 'required', ['required' => 'Jawaban Harap Diisi']);
        $this->form_validation->set_rules('idPesertaGame', 'Kode Unik', 'required', ['required' => 'Kode Unik Harap Diisi']);


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Philips Virtual Gathering';

            $data['user'] = $this->db->get_where('game', ['noHp' => $this->session->userdata('noHp')])->row_array();
            $this->load->view('templates/auth_header', $data);
            $this->load->view('game/q4', $data);
            $this->load->view('templates/auth_footer');
        } else {

            $idPesertaGame = $this->input->post('idPesertaGame', true);

            $answer = $this->input->post('answer', true);
            $data = [
                'idPesertaGame' => $idPesertaGame,
                'answer' => $answer,
            ];


            $cek = $this->db->query("SELECT COUNT(*) as count FROM `pertanyaan4` WHERE idPesertaGame ='".$idPesertaGame."' ")->row_array();
            if($cek['count'] < 1){
            
                $this->db->insert('pertanyaan4', $data);
                redirect('auth/pertanyaan5');
            }else{
                redirect('auth/pertanyaan5');
            }


        }
    }

    public function pertanyaan5()
    {
        $this->form_validation->set_rules('answer', 'Jawaban', 'required', ['required' => 'Jawaban Harap Diisi']);
        $this->form_validation->set_rules('idPesertaGame', 'Kode Unik', 'required', ['required' => 'Kode Unik Harap Diisi']);


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Philips Virtual Gathering';

            $data['user'] = $this->db->get_where('game', ['noHp' => $this->session->userdata('noHp')])->row_array();
            $this->load->view('templates/auth_header', $data);
            $this->load->view('game/q5', $data);
            $this->load->view('templates/auth_footer');
        } else {

            $idPesertaGame = $this->input->post('idPesertaGame', true);

            $answer = $this->input->post('answer', true);
            $data = [
                'idPesertaGame' => $idPesertaGame,
                'answer' => $answer,
            ];


            $cek = $this->db->query("SELECT COUNT(*) as count FROM `pertanyaan5` WHERE idPesertaGame ='".$idPesertaGame."' ")->row_array();
            if($cek['count'] < 1){
            
                $this->db->insert('pertanyaan5', $data);
                redirect('auth/pertanyaan6');
            }else{
                redirect('auth/pertanyaan6');
            }


        }
    }

    public function pertanyaan6()
    {
        $this->form_validation->set_rules('answer', 'Jawaban', 'required', ['required' => 'Jawaban Harap Diisi']);
        $this->form_validation->set_rules('idPesertaGame', 'Kode Unik', 'required', ['required' => 'Kode Unik Harap Diisi']);


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Philips Virtual Gathering';

            $data['user'] = $this->db->get_where('game', ['noHp' => $this->session->userdata('noHp')])->row_array();
            $this->load->view('templates/auth_header', $data);
            $this->load->view('game/q6', $data);
            $this->load->view('templates/auth_footer');
        } else {

            $idPesertaGame = $this->input->post('idPesertaGame', true);

            $answer = $this->input->post('answer', true);
            $data = [
                'idPesertaGame' => $idPesertaGame,
                'answer' => $answer,
            ];


            $cek = $this->db->query("SELECT COUNT(*) as count FROM `pertanyaan6` WHERE idPesertaGame ='".$idPesertaGame."' ")->row_array();
            if($cek['count'] < 1){
            
                $this->db->insert('pertanyaan6', $data);
                redirect('auth/pertanyaan7');
            }else{
                redirect('auth/pertanyaan7');
            }


        }
    }

    public function pertanyaan7()
    {
        $this->form_validation->set_rules('answer', 'Jawaban', 'required', ['required' => 'Jawaban Harap Diisi']);
        $this->form_validation->set_rules('idPesertaGame', 'Kode Unik', 'required', ['required' => 'Kode Unik Harap Diisi']);


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Philips Virtual Gathering';

            $data['user'] = $this->db->get_where('game', ['noHp' => $this->session->userdata('noHp')])->row_array();
            $this->load->view('templates/auth_header', $data);
            $this->load->view('game/q7', $data);
            $this->load->view('templates/auth_footer');
        } else {

            $idPesertaGame = $this->input->post('idPesertaGame', true);

            $answer = $this->input->post('answer', true);
            $data = [
                'idPesertaGame' => $idPesertaGame,
                'answer' => $answer,
            ];



            $cek = $this->db->query("SELECT COUNT(*) as count FROM `pertanyaan7` WHERE idPesertaGame ='".$idPesertaGame."' ")->row_array();
            if($cek['count'] < 1){
            
                $this->db->insert('pertanyaan7', $data);
                redirect('auth/pertanyaan8');
            }else{
                redirect('auth/pertanyaan8');
            }

        }
    }

    public function pertanyaan8()
    {
        $this->form_validation->set_rules('answer', 'Jawaban', 'required', ['required' => 'Jawaban Harap Diisi']);
        $this->form_validation->set_rules('idPesertaGame', 'Kode Unik', 'required', ['required' => 'Kode Unik Harap Diisi']);


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Philips Virtual Gathering';

            $data['user'] = $this->db->get_where('game', ['noHp' => $this->session->userdata('noHp')])->row_array();
            $this->load->view('templates/auth_header', $data);
            $this->load->view('game/q8', $data);
            $this->load->view('templates/auth_footer');
        } else {

            $idPesertaGame = $this->input->post('idPesertaGame', true);
            $noHp = $this->input->post('noHp', true);
            $answer = $this->input->post('answer', true);

            $data = [
                'idPesertaGame' => $idPesertaGame,
                'answer' => $answer,
            ];


            $cek = $this->db->query("SELECT COUNT(*) as count FROM `pertanyaan8` WHERE idPesertaGame ='".$idPesertaGame."' ")->row_array();
            if($cek['count'] < 1){
            
                $this->db->insert('pertanyaan8', $data);

                $tabel = 'login_details_game';
                $noHp = $this->input->post('noHp');
        
                date_default_timezone_set('Asia/Jakarta');
                $date = date('Y-m-d h:i:s');
                $data = array(
                    'end_time' => $date
                );
        
                $this->db->where('user_id', $noHp);
                $this->db->update($tabel, $data);
                $this->session->unset_userdata('noHp');


                redirect('auth/thankyougame');
            }else{
                redirect('auth/thankyougame');
            }


        }
    }


    public function thankyougame()
    {
        $data['title'] = 'Thankyou';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/thankyougame', $data);
        $this->load->view('templates/auth_footer');
    }

    public function thankyou()
    {
        $data['title'] = 'Welcome Page';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/thankyou', $data);
        $this->load->view('templates/auth_footer');
    }



    public function logout()
    {
        $tabel = 'login_details';
        $id = $this->input->post('id');

        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d h:i:s');
        $data = array(
            'logout_time' => $date
        );


        $this->db->where('user_id', $id);
        $this->db->update($tabel, $data);

        $this->session->unset_userdata('kodeUnik');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }


    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
