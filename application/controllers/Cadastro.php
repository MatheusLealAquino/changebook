<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

	public function index() {
		$this->load->model('Usuario_model');
		$this->Usuario_model->dataCriacao = date("Y-m-d");
		$this->Usuario_model->nome = "Matheus";
		$this->Usuario_model->email = "teste@teste.com";
		$this->Usuario_model->senha = md5('123456');
		$this->Usuario_model->fotoPerfil = 'url';

		$this->Usuario_model->create();
	}
}
