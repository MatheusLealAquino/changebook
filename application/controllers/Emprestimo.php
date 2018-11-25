<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emprestimo extends CI_Controller {

    public function __construct(){
		parent::__construct();

		if($this->session->userdata('logged_in') != TRUE){
			redirect('/Home/');
		}		
    }
    
    public function create(){
        $data['title'] = 'Realizar Emprestimo';

        $anuncioId = $this->input->get('idAnuncio');
        $usuarioId = $this->session->userdata('id');

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }

        $this->load->view('fixed/header', $data);
        $this->load->view('realizar_emprestimo');
        $this->load->view('fixed/footer');
    }

    public function result(){
        $data['title'] = 'Resultado';

        $this->load->view('fixed/header', $data);
        $this->load->view('realizar_emprestimo');
        $this->load->view('fixed/footer');
    }
}