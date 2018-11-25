<?php 
    class Anuncio_model extends CI_Model {
        private $tableName = "anuncio";

        public $idAnuncio;
        public $idLivro;
        public $idUsuario;
        public $urlCapa;
        public $dataCriacao;
        public $preco;
        public $idLocalizacao;
        public $titulo;
        public $status;
        
        public function create(){
            $this->db->insert($this->tableName, $this);
            return $this->db->insert_id();
        }

        public function searchByUser($idUsuario) {
            $this->db->select('*');
            $this->db->from('anuncio');
            $this->db->where('idUsuario', $idUsuario);
            $query = $this->db->get();

            return $query->result_array();
        }

        public function read($id=null, $status=null){
            if($id != null) $this->db->where('idAnuncio', $id);
            if($status != null) $this->db->where('status', $status);
            $query = $this->db->select('*')
                  ->from('anuncio')
                  ->join('usuario', 'usuario.id = anuncio.idUsuario')
                  ->join('livro', 'livro.id = anuncio.idLivro')
                  ->join('localizacao', 'localizacao.id = anuncio.idLocalizacao')
                  ->get();
            return $query->result_array();
        }

        public function readByIdUser($id){
            $this->db->where('idUsuario', $id);
            $query = $this->db->select('*')
                  ->from('anuncio')
                  ->join('usuario', 'usuario.id = anuncio.idUsuario')
                  ->join('livro', 'livro.id = anuncio.idLivro')
                  ->join('localizacao', 'localizacao.id = anuncio.idLocalizacao')
                  ->get();
            return $query->result_array();
        }

        public function update(){
            $this->db->where('idAnuncio', $this->idAnuncio);
            return $this->db->update($this->tableName, $this);
        }

        public function delete(){
            $this->db->where('idAnuncio', $this->idAnuncio);
            return $this->db->delete($this->tableName);
        }

        public function search($bookName){
            $query = $this->db->select('*')
                ->from('anuncio')
                ->join('livro', 'anuncio.idLivro = livro.id')
                ->like('nome', $bookName)
                ->get();
            return $query->result_array();
        }
    }
?>