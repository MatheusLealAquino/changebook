<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anuncio extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('logged_in') == NULL){
			redirect('/Home/');
		}		
	}

	public function index() {	
		$data['title'] = 'Anuncios';
        
		$this->load->model('Anuncio_model');

		$data['anuncios'] = $this->Anuncio_model->read();

		$this->load->view('fixed/header', $data);
        $this->load->view('anuncio');
		$this->load->view('fixed/footer.php');
	}

	public function search(){
		$bookSearch = $this->input->get('s');
		$data['title'] = 'Anuncios - '.$bookSearch;

		$this->load->model('Anuncio_model');

		$data['anuncios'] = $this->Anuncio_model->search($bookSearch);
		
		$this->load->view('fixed/header', $data);
        $this->load->view('anuncio');
		$this->load->view('fixed/footer.php');
	}
}
