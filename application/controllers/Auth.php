<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login() {
		$this->load->model('Usuario_model');

		$this->Usuario_model->email = $this->input->post('email');
		$this->Usuario_model->senha = md5($this->input->post('senha'));

		if($this->Usuario_model->login()){
			
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
