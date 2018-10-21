<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function logout() {

		$data = array(
			'title' => 'Realizar logout'
		);

		$this->load->view('fixed/header', $data);
        $this->load->view('login');
		$this->load->view('fixed/footer.php');
	}
}
