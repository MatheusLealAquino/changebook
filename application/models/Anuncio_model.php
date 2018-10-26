<?php 
    class Anuncio_model extends CI_Model {
        private $tableName = "anuncio";

        public $id;
        public $idLivro;
        public $idUsuario;
        public $dataCriacao;
        public $preco;
        public $idLocalizacao;
        
        public function create(){
            $this->db->insert($this->tableName, $this);
            return $this->db->insert_id();
        }

        public function read($id=null){
            if($id != null) $this->db->where('idUsuario', $id);
            $query = $this->db->select('*')
                  ->from('anuncio')
                  ->join('usuario', 'usuario.id = anuncio.idUsuario')
                  ->join('livro', 'livro.id = anuncio.idLivro')
                  ->get();
            return $query->result_array();
        }

        public function update(){
            $this->db->where('id', $this->id);
            return $this->db->update($this->tableName, $this);
        }

        public function delete(){
            $this->db->where('id', $this->id);
            return $this->db->delete($this->tableName);
        }

        public function search($bookName){
            $query = $this->db->select('*')
                ->from('anuncio')
                ->join('livro', 'livro.nome LIKE "%'.$bookName.'%"')
                ->get();
            return $query->result_array();
        }
    }
?>