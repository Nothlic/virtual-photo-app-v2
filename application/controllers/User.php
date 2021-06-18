<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Produk_model');
        $this->load->model('User_model');
    }


    // public function index()
    // {
    //     $data['user'] = $this->db->get_where('user', ['kodeUnik' => $this->session->userdata('kodeUnik')])->row_array();

    //     $data['data'] = $this->Produk_model->get_all_produk();
    //     $data['youtube'] = $this->User_model->getYoutube();
    //     $this->load->view('front2/templates/headermobile', $data);
    //     $this->load->view('front2/mobile', $data);
    //     $this->load->view('front2/templates/footermobile');
    // }

    public function front2()
    {
        $data['title'] = 'Photobooth';
        $data['user'] = $this->db->get_where('user', ['kodeUnik' => $this->session->userdata('kodeUnik')])->row_array();
        $this->load->view('templates/auth_header', $data);
        $this->load->view('front2/Photobooth', $data);
    }

    public function photoEditor()
    {
        $data['user'] = $this->db->get_where('user', ['kodeUnik' => $this->session->userdata('kodeUnik')])->row_array();
        $this->load->view('photo/index.html',$data);
    }



    // public function front2()
    // {
    //     $data['user'] = $this->db->get_where('user', ['kodeUnik' => $this->session->userdata('kodeUnik')])->row_array();

    //     $data['data'] = $this->Produk_model->get_all_produk();
    //     $data['youtube'] = $this->User_model->getYoutube();
    //     $this->load->view('front2/templates/headermobile', $data);
    //     $this->load->view('front2/mobile', $data);
    //     $this->load->view('front2/templates/footermobile');
    // }


    public function mc()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'MC EcoLink';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/mc', $data);
        $this->load->view('templates/mcfooter');
    }

    public function ts()
    {
        $data['user'] = $this->db->get_where('user', ['kodeUnik' => $this->session->userdata('kodeUnik')])->row_array();

        $data['title'] = 'Technical Support EcoLink';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/mc');
        $this->load->view('templates/ts_footer');
    }

    public function action()
    {
        //action.php
        include('database_connection.php');
        date_default_timezone_set('Asia/Jakarta');
        if (isset($_POST["action"])) {
            if ($_POST["action"] == "update_time") {
                $query = "
        UPDATE login_details 
        SET last_activity = :last_activity 
        WHERE login_details_id = :login_details_id
        ";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        'last_activity'  => date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa'))),
                        'login_details_id' => $_SESSION["login_id"]
                    )
                );
            }
            if ($_POST["action"] == "fetch_data" || $_POST["action"] == "update_time") {
                $output = '';
                $query = "
        SELECT login_details.user_id, user.provinsi, user.name FROM login_details 
  INNER JOIN user
  ON user.id = login_details.user_id 
  WHERE login_details.last_activity > DATE_SUB(NOW(), INTERVAL 5 SECOND) 
  AND user.role_id != '1'
        ";
                $statement = $connect->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
                $count = $statement->rowCount();
                $output .= '
        <div class="container-fluid">
        <div class="table-responsive">
        <div align="right" style="color:black;">
            ' . $count . ' Users Online
        </div>
        <table class="table table-dark table-bordered table-striped" id="useronline">
        
            <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Provinsi</th>
            </tr>
        ';

                $i = 0;
                foreach ($result as $row) {
                    $i = $i + 1;
                    $output .= '
                    <tr> 
                        <td>' . $i . '</td>
                        <td>' . $row["name"] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row["provinsi"] . '</td>
                    </tr>
                    ';
                }
                $output .= '</table></div></div>';
                echo $output;
            }
        }
    }


    //fungsi chat
    function get_product()
    {
        $data = $this->User_model->get_product()->result();
        echo json_encode($data);
    }

    function create()
    {
        $idUser = $this->input->post('idUser', TRUE);
        $name = $this->input->post('name', TRUE);
        $isi = $this->input->post('isi', TRUE);
        $this->User_model->insert_product($idUser,$name, $isi);

        require_once(APPPATH . 'views/vendor/autoload.php');
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '4989a359f9bcaf8f0e4e',
            '76862773ca7291fca4b2',
            '1104017',
            $options
        );

        $data['message'] = 'success';
        $pusher->trigger('my-channel', 'my-event', $data);
    }

    //chat end here

    function add_to_cart()
    { //fungsi Add To Cart
        $data = array(
            'id' => $this->input->post('produk_id'),
            'name' => $this->input->post('produk_nama'),
            'price' => $this->input->post('produk_harga'),
            'qty' => $this->input->post('quantity'),
        );
        $this->cart->insert($data);
        echo $this->show_cart(); //tampilkan cart setelah added
    }

    function show_cart()
    { //Fungsi untuk menampilkan Cart
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .= '
                <tr>
                    <td>' . number_format($items['price']) . '</td>
                    <td>' . $items['name'] . '</td>
                    <td>' . $items['qty'] . '</td>
                    <td>' . number_format($items['subtotal']) . '</td>
                    <td><button type="button" id="' . $items['rowid'] . '" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                </tr>
            ';
        }
        $output .= '
            <tr>
                <th colspan="3">Total Pembelian</th>
                <th colspan="2">' . 'Rp ' . number_format($this->cart->total()) . '</th>
            </tr>
        ';
        return $output;
    }

    function load_cart()
    { //load data cart
        echo $this->show_cart();
    }

    function hapus_cart()
    { //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'),
            'qty' => 0,
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }

    function tambahTransaksi()
    {
        //print_r ($_POST);
        $this->User_model->tambahMasterTransaksi($_POST['user'], $_POST['total']);

        $id = $this->User_model->getIdTransaksi();
        //echo($_POST['produk'][0]);
        $count = count($_POST['produk']);
        for ($i = 0; $i < $count; $i++) {
            $idProduk = $this->User_model->getIdProduk($_POST['produk'][$i]);
            // $produk = $idProduk['id'];
            //echo($idProduk['id']);
            $this->User_model->tambahDetailTransaksi($id['id'], $idProduk['id'], $_POST['qty'][$i]);
        }
    }

    public function download()
    {
        $this->load->helper('download');
        $file = 'assets/assetsfront2/images/katalog.pdf';
        force_download($file, NULL);
    }

    public function downloadlist()
    {
        $this->load->helper('download');
        $file = 'assets/assetsfront2/images/listproduk.jpg';
        force_download($file, NULL);
    }


    public function downloaddetail()
    {
        $this->load->helper('download');
        $file = 'assets/assetsfront2/images/detailpaket.pdf';
        force_download($file, NULL);
    }

    public function downloadpanduan()
    {
        $this->load->helper('download');
        $file = 'assets/assetsfront2/images/panduan.pdf';
        force_download($file, NULL);
    }


    public function save()
	{
		$username = $this->input->post('username', true);
		$image = $this->input->post('image');
		$image = str_replace('data:image/jpeg;base64,','', $image);
		$image = base64_decode($image);
		$filename = 'image_'.time().'.png';
		file_put_contents(FCPATH.'/assets/img/'.$filename,$image);
		$data = array(
			'username' => $username,
			'image' => $filename,
        );

		$res = $this->db->insert('photobooth', $data);
		echo json_encode($res);
	}
}
