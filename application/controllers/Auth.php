<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login() {
		$this->load->model('Auth_model');

		$email = $this->input->post('email');
		$senha = md5($this->input->post('senha'));
		if( $this->Auth_model->login($email, $senha) ){
			
		}else{

		}
	}

	public function logout() {
		
		$data = array(
			'title' => 'Realizar logout'
		);

		$this->load->view('fixed/header', $data);
        $this->load->view('login');
		$this->load->view('fixed/footer.php');
	}
}
