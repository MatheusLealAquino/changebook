<?php 
    class Anuncio_model extends CI_Model {
        private $tableName = "anuncio";

        public $id;
        public $idLivro;
        public $dataCriacao;
        public $preco;
        public $status;
        public $idLocalizacao;
        
        public function create(){
            return $this->db->insert($this->tableName, $this);
        }

        public function read($id=null){
            if($id != null) $this->db->where('id', $id);
            $query = $this->db->get($this->tableName);
            return $query->result();
        }

        public function update(){
            $this->db->where('id', $this->id);
            return $this->db->update($this->tableName, $this);
        }

        public function delete(){
            $this->db->where('id', $this->id);
            return $this->db->delete($this->tableName);
        }
    }
?>