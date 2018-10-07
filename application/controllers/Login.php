<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		
		$data = array(
			'title' => 'Realizar login'
		);

		$this->load->view('fixed/header', $data);
        $this->load->view('login');
		$this->load->view('fixed/footer.php');
	}
}
