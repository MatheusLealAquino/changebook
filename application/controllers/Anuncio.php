<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anuncio extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('logged_in') == NULL){
			redirect('/Home/');
		}		
	}

	public function index() {	
		$data['title'] = 'Anuncios';
        
		$this->load->model('Anuncio_model');

		$data['anuncios'] = $this->Anuncio_model->read(null, true);

		$this->load->view('fixed/header', $data);
        $this->load->view('anuncios');
		$this->load->view('fixed/footer.php');
	}

	public function search(){
		$bookSearch = $this->input->get('s');
		$data['title'] = 'Anuncios - '.$bookSearch;

		$this->load->model('Anuncio_model');

		$data['anuncios'] = $this->Anuncio_model->search($bookSearch);
		
		$this->load->view('fixed/header', $data);
        $this->load->view('anuncios');
		$this->load->view('fixed/footer.php');
	}

	public function create(){
		$data['title'] = "Cadastrar Anúncio";
		
		$this->load->model('Livro_model');
		$this->load->model('Localizacao_model');

		$data['livros'] = $this->Livro_model->read();
		$data['localizacoes'] = $this->Localizacao_model->read();

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->load->model('Anuncio_model');

			$this->Anuncio_model->idLivro = $this->input->post('livro');
			$this->Anuncio_model->idUsuario = $this->session->userdata('id'); 
			$this->Anuncio_model->dataCriacao = date("Y-m-d"); 
			$this->Anuncio_model->preco = $this->input->post('preco'); 
			$this->Anuncio_model->titulo = $this->input->post('titulo'); 
			$this->Anuncio_model->idLocalizacao = $this->input->post('localizacao');
			
			$id = $this->Anuncio_model->create();

			if($id){
				$this->Anuncio_model->idAnuncio = $id;

				if (isset($_FILES['fotoAnuncio']) && !empty($_FILES['fotoAnuncio']['name'])){
					$data['upload'] = $this->uploadPhoto();
				}else{
					$this->Anuncio_model->urlCapa = "";
				}

				$this->Anuncio_model->update();
				$data['success'] = "Anúncio criado com sucesso!";
			}else{
				$data['error'] = "Anúncio não foi criado"; 
			}
		}

		$this->load->view('fixed/header', $data);
		$this->load->view('cadastro_anuncio');
		$this->load->view('fixed/footer.php');
	}

	public function read($id){
		$data['title'] = 'Anuncios';

		$this->load->model('Anuncio_model');
		$data['anuncio'] = $this->Anuncio_model->read($id);

		$this->load->view('fixed/header', $data);
		$this->load->view('anuncio');
		$this->load->view('fixed/footer.php');
	}

	public function edit($id){
		$this->load->model('Anuncio_model');
		$this->load->model('Livro_model');
		$this->load->model('Localizacao_model');

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$data['anuncio'] = $this->Anuncio_model->read($id)[0];
			if($this->session->userdata('id') == $data['anuncio']['idUsuario']){
				$this->Anuncio_model->idAnuncio = $id;
				$this->Anuncio_model->idLivro = $this->input->post('livro');
				$this->Anuncio_model->idUsuario = $this->session->userdata('id'); 
				$this->Anuncio_model->dataCriacao = date("Y-m-d"); 
				$this->Anuncio_model->preco = $this->input->post('preco'); 
				$this->Anuncio_model->titulo = $this->input->post('titulo'); 
				$this->Anuncio_model->idLocalizacao = $this->input->post('localizacao');
				$this->Anuncio_model->urlCapa = $this->input->post('urlCapa');
				
				if($this->input->post('status') == null) $this->Anuncio_model->status = false;
				else $this->Anuncio_model->status = true;

				if (isset($_FILES['fotoAnuncio']) && !empty($_FILES['fotoAnuncio']['name'])){
					$data['upload'] = $this->uploadPhoto();
				}

				if($this->Anuncio_model->update()){
					$data['success'] = "Anúncio atualizado com sucesso!";
				}else{
					$data['error'] = "Anúncio não foi atualizado!"; 
				}
			}else{
				$data['error'] = "Esse usuário não possui permissão de editar esse anúncio";
			}
		}
		
		$data['anuncio'] = $this->Anuncio_model->read($id)[0];
		$data['livros'] = $this->Livro_model->read();
		$data['localizacoes'] = $this->Localizacao_model->read();
		$data['title'] = 'Editar Anúncio - '.$data['anuncio']['nome'];
		
		if($this->session->userdata('id') != $data['anuncio']['idUsuario']){
			redirect('/Anuncio/read/'.$id);
		}
		
		$this->load->view('fixed/header', $data);
		$this->load->view('editar_anuncio');
		$this->load->view('fixed/footer.php');
	}

	public function delete($id){
		$anuncio = $this->db->delete('anuncio', array('idAnuncio' => $id));
		if($anuncio) {
			$data = "status=success&message=Anúncio excluído";
		} else {
			$data = "status=erro&message=Anúncio não excluído";
		}

		redirect('/Usuario/perfil/'.$this->session->userdata('id').'?'.$data);
	}


	private function uploadPhoto(){
        $this->load->model('Anuncio_model');

        $path = $_FILES['fotoAnuncio']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);

        $urlPicture = trim($this->Anuncio_model->idAnuncio);
        $upload_path = './uploads/advertisement/';

        $config['file_name']            = $urlPicture;
        $config['upload_path']          = $upload_path;
        $config['allowed_types']        = 'jpg|png';
        $config['overwrite']            = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fotoAnuncio')){
			$data['error'] = $this->upload->display_errors();
			var_dump($data['error']);
        }else{
            $this->Anuncio_model->urlCapa = 'uploads/advertisement/'.$urlPicture.'.'.$ext;        
            $data['data'] = $this->upload->data();
        }
        return $data;
    }
}
