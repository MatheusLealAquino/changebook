<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('logged_in') == true){
			redirect('/Anuncio/');
		}		
	}
	 
	public function index() {
		$data = array(
			'title' => 'Index'
		);

		$this->load->view('fixed/header', $data);
        $this->load->view('index');
		$this->load->view('fixed/footer.php');
	}

	public function cadastro() {
		$data = array(
			'title' => 'Index'
		);

		if($this->input->post('password') != $this->input->post('password2')){
            $data['error'] = 'Senhas não conferem.';
            $this->load->view('fixed/header', $data);
            $this->load->view('index');
		    $this->load->view('fixed/footer.php');
        }

        $this->load->model('Usuario_model');

        $this->Usuario_model->dataCriacao = date("Y-m-d");
		$this->Usuario_model->nome = $this->input->post('name');
		$this->Usuario_model->email = $this->input->post('email');
		$this->Usuario_model->senha = md5($this->input->post('password'));

        if($this->Usuario_model->create()){
            $data['cadastro_usuario'] = 'Usuário criado com sucesso.';
        }else{
            $data['error'] = 'Usuário não foi criado.';
            $this->load->view('fixed/header', $data);
            $this->load->view('index');
		    $this->load->view('fixed/footer.php');
        }
        
        $userData = array(
            'email' => $this->Usuario_model->email,
            'logged_in' => TRUE
        );
    
        $this->session->set_userdata($userData);
        
        redirect('/Anuncio/');
    }

	public function login() {
		$data = array(
			'title' => 'Index'
		);
		
		$this->load->model('Auth_model');

		$email = $this->input->post('email');
		$senha = md5($this->input->post('password'));
		if( $this->Auth_model->login($email, $senha) ){
			$userData = array(
				'email' => $this->Usuario_model->email,
				'logged_in' => TRUE
			);
		
			$this->session->set_userdata($userData);

			redirect('/Anuncio/');
		}else{
			$data['error'] = 'E-mail e/ou senha não estão corretos!';
            $this->load->view('fixed/header', $data);
            $this->load->view('index');
		    $this->load->view('fixed/footer.php');
		}
	}
}
