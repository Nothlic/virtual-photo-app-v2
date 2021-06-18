<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
		$this->load->model('User_model');
		$this->load->model('Produk_model');
    }
    
    public function destroy()
    {
        $this->session->userdata = array();
        $this->session->sess_destroy();
        redirect('home', 'refresh');
    }
    
    
    
    public function filterpeserta()
    {
        $data['title'] = 'Filter Peserta';
        $data['user'] = $this->db->get_where('user', ['kodeUnik' => $this->session->userdata('kodeUnik')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/filterpeserta', $data);
        $this->load->view('templates/footer');
    }
    
    
    public function detail()
    {   
        $data['title'] = 'Filter Peserta';
        $data['user'] = $this->db->get_where('user', ['kodeUnik' => $this->session->userdata('kodeUnik')])->row_array();

        $id = $this->input->post('tanggal');
        $data['data'] = $this->Produk_model->getDataById($id);


        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('admin/detail',$data);
        $this->load->view('templates/footer');
    }
    
    

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['kodeUnik' => $this->session->userdata('kodeUnik')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    
    
    
//     public function activity()
//     {
//         $data['title'] = 'Activity';
//         $data['user'] = $this->db->get_where('user', ['kodeUnik' => $this->session->userdata('kodeUnik')])->row_array();
//         $data['activity'] = $this->db->query("SELECT login_details.last_activity,user.name,user.kodeUnik,user.provinsi,user.email,user.namaToko,user.noHp,user.namaSales FROM `login_details`
// LEFT JOIN user ON login_details.user_id = user.id WHERE user.role_id = 2 AND last_activity  BETWEEN '2020-07-09 16:20:00' AND '2020-07-09 23:59:59'
// GROUP BY user.kodeUnik
// ORDER BY `login_details`.`last_activity` ASC")->result_array();
//         $this->load->view('templates/header', $data);
//         $this->load->view('templates/sidebar', $data);
//         $this->load->view('templates/topbar', $data);
//         $this->load->view('admin/activity', $data);
//         $this->load->view('templates/footer');
        
//     }
    
    
//     public function hue()
//     {
//         $data['user'] = $this->db->get_where('user', ['kodeUnik' => $this->session->userdata('kodeUnik')])->row_array();

//         $data['youtube'] = $this->User_model->getYoutube();
//         $data['data']=$this->Produk_model->get_all_produk();
//         $data['produk'] = $this->Produk_model->getProduk();
        
        
        
//         $a = $this->db->get('youtube')->row_array();
        
//         $data['title'] = 'Waiting';
//         /*
//         if($a['link']==null)
//         {
//             $this->load->view('templates/authh_header', $data);
//             $this->load->view('front2/waiting');
//             $this->load->view('templates/authh_footer');
            
//         }elseif($a['link'] == '')
//         {
//             $this->load->view('templates/authh_header', $data);
//             $this->load->view('front2/waiting');
//             $this->load->view('templates/authh_footer');
//         }
//         else{*/
//             $this->load->view('front2/templates/header', $data);
//             $this->load->view('front2/index', $data);
//             $this->load->view('front2/templates/footer');
        
//     }
    
//     public function report()
//     {
//         $data['title'] = 'Report';
//         $data['user'] = $this->db->get_where('user', ['kodeUnik' => $this->session->userdata('kodeUnik')])->row_array();
//         $data['transaksi'] = $this->db->query('SELECT m_transaksi.idTransaksi,user.kodeUnik,user.name,user.provinsi,m_transaksi.total,m_transaksi.tanggal FROM `m_transaksi`
// LEFT JOIN `user` ON m_transaksi.idUser = user.id')->result_array();
        
//         $data['detailtransaksi'] = $this->db->query('SELECT d_transaksi.idTransaksi, d_transaksi.qty, tbl_produk.produk_nama, tbl_produk.produk_harga
// FROM d_transaksi
// INNER JOIN tbl_produk ON d_transaksi.idProduk = tbl_produk.produk_id')->result_array();
//         $this->load->view('templates/header', $data);
//         $this->load->view('templates/sidebar', $data);
//         $this->load->view('templates/topbar', $data);
//         $this->load->view('transaksi/report', $data);
//         $this->load->view('templates/footer');
//     }
    
    
    public function transaksi()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['kodeUnik' => $this->session->userdata('kodeUnik')])->row_array();
        $data['transaksi'] = $this->db->query('SELECT m_transaksi.idTransaksi,user.kodeUnik,user.name,tbl_produk.produk_nama,d_transaksi.qty,m_transaksi.tanggal FROM `m_transaksi`
LEFT JOIN `user` ON m_transaksi.idUser = user.id
LEFT JOIN d_transaksi ON m_transaksi.idTransaksi = d_transaksi.idTransaksi
LEFT JOIN tbl_produk ON tbl_produk.produk_id = d_transaksi.idProduk')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/footer');
        
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['kodeUnik' => $this->session->userdata('kodeUnik')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }




    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['kodeUnik' => $this->session->userdata('kodeUnik')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }


    public function peserta()
	{
        $data['title'] = 'Peserta';

        $data['user'] = $this->db->get_where('user', ['kodeUnik' => $this->session->userdata('kodeUnik')])->row_array();
        $data['peserta'] = $this->User_model->getPeserta();
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['provinsi'] = $this->User_model->getProvinsi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peserta/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    
       public function sales()
	{
        $data['title'] = 'Sales';

        $data['user'] = $this->db->get_where('user', ['kodeUnik' => $this->session->userdata('kodeUnik')])->row_array();
        $data['peserta'] = $this->User_model->getSales();
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['provinsi'] = $this->User_model->getProvinsi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sales/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahPeserta()
    {
        // if ($this->session->userdata('email')) {
        //     redirect('user');
        // }
        $data['title'] = 'Tambah Peserta';

        $data['user'] = $this->db->get_where('user', ['kodeUnik' => $this->session->userdata('kodeUnik')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $data['provinsi'] = $this->User_model->getProvinsi();
  
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Peserta';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('peserta/tambah');
            $this->load->view('templates/footer', $data);
        } else {
            $email = $this->input->post('email', true);
            $kodeUnik = $this->input->post('kodeUnik', true);
            $noHp = $this->input->post('noHp', true);
            $provinsi = $this->input->post('provinsi', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'kodeUnik' => $kodeUnik,
                'noHp' => $noHp,
                'provinsi' => $provinsi,
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

             // siapkan token
             $token = base64_encode(random_bytes(32));
             $user_token = [
                 'email' => $email,
                 'token' => $token,
                 'date_created' => time()
             ];
 
             $this->db->insert('user', $data);
             $this->db->insert('user_token', $user_token);
 
            //  $this->_sendEmail($token, 'verify');

            redirect('admin/peserta');
        }
    }
    
    
     public function editPeserta($id)
    {   
        $data['title'] = 'Edit Peserta';
        $data['user']= $this->db->get_where('user',['email' => 
        $this->session->userdata('email')])->row_array();
        
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $data['peserta'] = $this->User_model->getPesertaById($id);
        $this->form_validation->set_rules('email', 'Email', 'required');

        $data['provinsi'] = $this->User_model->getProvinsi();
	
        if($this->form_validation->run() == false)
        {   
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('peserta/edit',$data);
            $this->load->view('templates/footer');
        }
        else
        {

            $id = $this->input->post('id', true);
            $email = $this->input->post('email', true);
            $kodeUnik = $this->input->post('kodeUnik', true);
            $noHp = $this->input->post('noHp', true);
            $provinsi = $this->input->post('provinsi', true);
            
            $data = array(
                "email" => $email,
                "kodeUnik" => $kodeUnik,
                "noHp" => $noHp,
                'provinsi' => $provinsi,
            );

        $this->User_model->editPeserta($data,'user',$id);
           $this->session->set_flashdata('flash','Diubah');
           redirect('admin/peserta');
        }
    }


    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'constructorcode@gmail.com',
            'smtp_pass' => 'constructorcode..',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('wpunpas@gmail.com', 'Web Programming UNPAS');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function hapusPeserta($id)
    {
        $this->User_model->hapusPeserta($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
        redirect('admin/peserta');
    }

    
}
