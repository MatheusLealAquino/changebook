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
		$this->load->model('Livro_model');
		$data['livros'] = $this->Livro_model->read();
		$data['title'] = "Livros";

		$this->load->view('fixed/header', $data);
        $this->load->view('livros');
		$this->load->view('fixed/footer.php');
	}
    
    public function edit($id){
		$this->load->model('Livro_model');

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->Livro_model->nome = $this->input->post('nome');
			$this->Livro_model->sinopse = $this->input->post('sinopse');
			$this->Livro_model->id = $id;

			if($this->Livro_model->update()){
				$data['success'] = "Livro atualizado com sucesso!";
			}else{
				$data['error'] = "Livro não foi atualizado!";
			}

		}
		$data['livro'] = $this->Livro_model->read($id)[0];
		$data['title'] = 'Editar livro - '.$data['livro']['nome'];

		$this->load->view('fixed/header', $data);
        $this->load->view('editar_livro');
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