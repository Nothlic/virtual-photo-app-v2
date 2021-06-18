<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Youtube extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Youtube_model');
		$this->load->helper('url');
		$this->load->library('form_validation');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $data['title'] = 'Youtube';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['youtube'] = $this->Youtube_model->getYoutube();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('youtube/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function tambah()
	{
        $data['title'] = 'Tambah Youtube';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
		$this->form_validation->set_rules('link', 'Link Youtube', 'required');
		     
        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('Youtube/tambah', $data);
            $this->load->view('templates/footer', $data);
		}
		else
		{

            $link = $this->input->post('link');
            
            $data = array(
                "link" => $link,
            );

			$this->Youtube_model->tambahYoutube($data,'youtube');
			redirect('Youtube');
		}
    }


    public function editYoutube($id)
    {   
        $data['title'] = 'Edit Youtube';
        $data['user']= $this->db->get_where('user',['email' => 
        $this->session->userdata('email')])->row_array();
        
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $data['youtube'] = $this->Youtube_model->getYoutubeById($id);
        $this->form_validation->set_rules('link', 'Link Youtube', 'required');

	
        if($this->form_validation->run() == false)
        {   
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('youtube/edit',$data);
            $this->load->view('templates/footer');
        }
        else
        {

            $idYoutube = $this->input->post('idYoutube');
            $link = $this->input->post('link');
            
            $data = array(
                "link" => $link,
            );

        $this->Youtube_model->editYoutube($data,'youtube',$idYoutube);
           $this->session->set_flashdata('flash','Diubah');
           redirect('Youtube');
        }
    }

    public function hapusYoutube($id)
    {
        $this->Youtube_model->hapusYoutube($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus !</div>');
        redirect('Youtube');
    }
}
