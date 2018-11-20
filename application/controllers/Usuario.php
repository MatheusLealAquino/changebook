<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct(){
		parent::__construct();

		if($this->session->userdata('logged_in') == NULL){
			redirect('/Home/');
		}		
	}
    
    public function perfil($id){
        $this->load->model('Usuario_model');
        $this->load->model('Anuncio_model');

        $data['anuncios'] = $this->Anuncio_model->read($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id == $this->session->userdata('id')) {
            $data['usuario'] = $this->Usuario_model->read($this->session->userdata('id'))[0];

            $pass1 = $this->input->post('password');
            $pass2 = $this->input->post('password2');
            
            $this->Usuario_model->id = $id;
            $this->Usuario_model->dataCriacao = $data['usuario']['dataCriacao']; 
            $this->Usuario_model->nomeUsuario = $this->input->post('name');
            $this->Usuario_model->email = $this->input->post('email');    
            
            if( $pass1 != "" && $pass2 != "" && ($pass1 == $pass2)){
		        $this->Usuario_model->senha = md5($this->input->post('password'));
            }else{
                $this->Usuario_model->senha = $data['usuario']['senha'];
            }

            if (isset($_FILES['fotoPerfil']) && !empty($_FILES['fotoPerfil']['name'])){
                $data['upload'] = $this->uploadPhoto();
            }else{
                $this->Usuario_model->fotoPerfil = $data['usuario']['fotoPerfil'];
            }

            $this->Usuario_model->update();
            
            $this->session->unset_userdata('nome');
            $this->session->unset_userdata('email');

            $updateSession = array(
                'nome' => $this->Usuario_model->nomeUsuario,
                'email' => $this->Usuario_model->email
            );

            $this->session->set_userdata($updateSession);
        }
        
        $data['title'] = $this->session->userdata('nome');

        $data['usuario'] = $this->Usuario_model->read($this->session->userdata('id'))[0];

        $this->load->view('fixed/header', $data);
        $this->load->view('perfil');
        $this->load->view('fixed/footer.php');
    }

    private function uploadPhoto(){
        $this->load->model('Usuario_model');

        $path = $_FILES['fotoPerfil']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);

        $urlPicture = trim($this->Usuario_model->id);
        $upload_path = './uploads/profile/';

        $config['file_name']            = $urlPicture;
        $config['upload_path']          = $upload_path;
        $config['allowed_types']        = 'jpg|png';
        $config['overwrite']            = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fotoPerfil')){
            $data['error'] = $this->upload->display_errors();
        }else{
            $this->Usuario_model->fotoPerfil = 'uploads/profile/'.$urlPicture.'.'.$ext;        
            $data['data'] = $this->upload->data();
        }

        return $data;
    }
}
