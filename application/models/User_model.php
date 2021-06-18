<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    
    public function getActivity()
    {
        return $this->db->query("SELECT user.name,login_details.last_activity FROM `login_details`
LEFT JOIN user ON login_details.user_id = user.id")->result_array();
    }
    
        public function getYoutube()
    {
        return $this->db->get('youtube')->row_array();
    }


    public function hapusPeserta($id)
    {
        $this->db->delete('user',['id' => $id]);
    }
    
     public function getProvinsi()
    {
        return $this->db->query("SELECT * FROM m_provinsi")->result_array();
    }


    public function getUser()
    {
        return $this->db->get('user')->result_array();
    }

   public function getSales()
    {
        return $this->db->query('SELECT sales.*,m_provinsi.name as provinsi FROM sales LEFT JOIN m_provinsi ON sales.idProvinsi = m_provinsi.id')->result_array();
    }
    public function getPeserta()
    {
        return $this->db->query('SELECT * FROM user WHERE role_id =2')->result_array();
    }

    public function getChat()
    {
        $query = $this->db->get('chat');
        return $query;
    }
    
    public function getPesertaById($id)
    {
        return $this->db->get_where('user',['id' => $id])->row_array();
    }


    public function editPeserta($data,$tabel,$id)
    {   
        $this->db->where("id",$id);
        $this->db->update($tabel,$data);
    }
    public function tambahUser($data,$tabel)
    {
        $this->db->insert($tabel,$data);
    }

    public function hapusUser($id)
    {
        $this->db->delete('user',['id' => $id]);
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user',['id' => $id])->row_array();
    }

    public function editUser($data,$tabel,$idUser)
    {   
        $this->db->where("id",$idUser);
        $this->db->update($tabel,$data);
    }


    public function tambahLogin($data,$tabel)
    {
        $this->db->insert($tabel,$data);
    }


    //Start chat

    function comment($name,$isi){
        $data = array(
            'name' => $name,
            'isi' => $isi
        );
        $this->db->insert('chat', $data);
    }

    function get_product(){
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date("Y-m-d h:i:s");
        // WHERE waktu > '$waktu'
        $this->db->query("SELECT * FROM chats");
        $query = $this->db->get('chats');

        return $query;
    }

    function insert_product($idUser,$name,$isi){
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'idUser' => $idUser,
            'name' => $name,
            'isi' => $isi,
            'waktu' => date("Y-m-d h:i:sa")
        );
        $this->db->insert('chats', $data);
    }
    


    //Ini End Chat
     public function getIdTransaksi()
    {
        return $this->db->query("SELECT MAX(idTransaksi) as id FROM m_transaksi")->row_array();
    }
    
    function tambahMasterTransaksi($user,$total){
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'idUser' => $user,
            'total' => $total,
            'tanggal'=> date("Y-m-d h:i:sa")
        );
        $this->db->insert('m_transaksi', $data);
    }
    
    public function getIdProduk($produk)
    {
        return $this->db->query("SELECT produk_id as id FROM tbl_produk WHERE replace(replace(produk_image,' ',''),'\"','') = '$produk'")->row_array();
    }

    function tambahDetailTransaksi($id,$produk,$qty){
        
        $data = array(
            'idTransaksi' => $id,
            'idProduk' => $produk,
            'qty' => $qty
        );
        $this->db->insert('d_transaksi', $data);
    }
    
    function getAllProvinsi(){
        return $this->db->query("SELECT * FROM m_provinsi")->result_array();
    }
    
    function getAllSales(){
        return $this->db->query("SELECT * FROM sales")->result_array();
    }
    

    public function insert($tabel,$data) {
        $this->db->insert($tabel,$data);
    }
}
