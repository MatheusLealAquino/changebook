<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livro extends CI_Controller {
    
    public function __construct(){
		parent::__construct();

		if($this->session->userdata('logged_in') == NULL){
			redirect('/Home/');
		}		
    }
    
    public function index(){
        $data['title'] = 'Livros';
        
		$this->load->model('Livro_model');

		$data['livros'] = $this->Livro_model->read();

		$this->load->view('fixed/header', $data);
        $this->load->view('livro');
		$this->load->view('fixed/footer.php');
    }
}

?>