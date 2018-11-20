<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livro extends CI_Controller {
    
    public function __construct(){
		parent::__construct();

		if($this->session->userdata('logged_in') == NULL){
			redirect('/Home/');
		}		
    }
    
    public function read($id){
        $data['title'] = 'Livros';
        
		$this->load->model('Livro_model');

		$data['livros'] = $this->Livro_model->read();

		$this->load->view('fixed/header', $data);
        $this->load->view('livro');
		$this->load->view('fixed/footer.php');
	}
	
	public function create(){
        $data['title'] = 'Livros';

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->load->model('Livro_model');

			$this->Livro_model->nome = $this->input->post('nome');
			$this->Livro_model->sinopse = $this->input->post('sinopse');

			$id = $this->Livro_model->create();

			if($id){
				$data['success'] = "Livro cadastrado com sucesso!";
			}else{
				$data['error'] = "Livro não foi cadastrado!"; 
			}
		}

		$this->load->view('fixed/header', $data);
		$this->load->view('cadastro_livro');
		$this->load->view('fixed/footer.php');
    }
}

?>