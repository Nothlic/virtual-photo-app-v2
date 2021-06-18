<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Youtube_model extends CI_Model
{

    public function getYoutube()
    {
        return $this->db->get('youtube')->result_array();
    }

    public function tambahYoutube($data,$tabel)
    {
        $this->db->insert($tabel,$data);
    }

    public function hapusYoutube($id)
    {
        $this->db->delete('youtube',['idYoutube' => $id]);
    }

    public function getYoutubeById($id)
    {
        return $this->db->get_where('youtube',['idYoutube' => $id])->row_array();
    }

    public function editYoutube($data,$tabel,$idYoutube)
    {   
        $this->db->where("idYoutube",$idYoutube);
        $this->db->update($tabel,$data);
    }



}
