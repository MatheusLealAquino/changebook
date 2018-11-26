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

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->load->model('Emprestimo_model');
            $this->Emprestimo_model->idUsuarioDono = $this->input->post('idUsuarioDono');
            $this->Emprestimo_model->idUsuarioAluguel = $this->session->userdata('id'); 
            $this->Emprestimo_model->idAnuncio = $this->input->post('idAnuncio');
            $this->Emprestimo_model->data = date("Y-m-d");
            $this->Emprestimo_model->valor = $this->input->post('valor');  

            if($this->Emprestimo_model->create()){
                redirect('/Emprestimo/result?idUsuario='.$this->input->post('idUsuarioDono'));
            }else{
                redirect('/Emprestimo/create?idAnuncio='.$this->input->post('idAnuncio'));
            }
        }else{
            $this->load->model('Anuncio_model');

            $anuncioId = $this->input->get('idAnuncio');
            $usuarioId = $this->session->userdata('id');

            $data['anuncio'] = $this->Anuncio_model->read($anuncioId);    
        }
        
        $this->load->view('fixed/header', $data);
        $this->load->view('realizar_emprestimo');
        $this->load->view('fixed/footer');
    }

    public function result(){
        $data['title'] = 'Resultado';
        
        $this->load->model('Usuario_model');

        $data['usuario'] = $this->Usuario_model->read($this->input->get('idUsuario'));

        $this->load->view('fixed/header', $data);
        $this->load->view('finalizacao_emprestimo');
        $this->load->view('fixed/footer');
    }
}