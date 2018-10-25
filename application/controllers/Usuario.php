<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
    
    public function perfil($id){
        $data['title'] = $this->session->userdata('nome');

        $this->load->view('fixed/header', $data);
        $this->load->view('cadastro');
        $this->load->view('fixed/footer.php');
    }

    public function update(){
        $this->load->model('Usuario_model');

    }

    public function uploadPhoto(){
        $this->load->model('Usuario_model');

        $urlPicture = date("Y-m-d H:i:s").'_'.$this->input->post('nome');
        $upload_path = './uploads/profile';
        $this->Usuario_model->fotoPerfil = $upload_path.$urlPicture;
        
        $config['file_name']            = $urlPicture;
        $config['upload_path']          = $upload_path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('fotoPerfil')){
            $data['error'] = $this->upload->display_errors();
            $this->load->view('fixed/header', $data);
            $this->load->view('cadastro');
		    $this->load->view('fixed/footer.php');
        }else{
            $data['upload_data'] = $this->upload->data();
        }
    }
}
