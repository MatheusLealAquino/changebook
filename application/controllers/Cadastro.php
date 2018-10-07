<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

	public function index() {
		$data = array(
			'title' => 'Realizar cadastro'
		);

		$this->load->view('fixed/header', $data);
        $this->load->view('cadastro');
		$this->load->view('fixed/footer.php');
	}
}
