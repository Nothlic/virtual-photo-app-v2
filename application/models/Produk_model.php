<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{

    public function getProduk()
    {
        return $this->db->get('tbl_produk')->result_array();
    }

    public function tambahProduk($data,$tabel)
    {
        $this->db->insert($tabel,$data);
    }
    
    public function getDataById($id)
    {
        return $this->db->query("SELECT * FROM `user` WHERE date(tanggalRegistrasi) = '".$id."' AND role_id = 2")->result_array();
    }


    public function hapusProduk($id)
    {
        $this->db->delete('tbl_produk',['produk_id' => $id]);
    }

    public function getProdukById($id)
    {
        return $this->db->get_where('tbl_produk',['produk_id' => $id])->row_array();
    }

    public function editProduk($data,$tabel,$produk_id)
    {   
         $this->db->where("produk_id",$produk_id);
        $this->db->update($tabel,$data);
    }

    function get_all_produk(){
        $hasil=$this->db->get('tbl_produk');
        return $hasil->result();
    }
     



}
