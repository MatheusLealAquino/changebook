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

        $anuncioId = $this->input->get('anuncio');
        $usuarioId = $this->session->userdata('id');

        $this->load->view('fixed/header', $data);
        $this->load->view('realizar_emprestimo');
        $this->load->view('fixed/footer');
    }
}