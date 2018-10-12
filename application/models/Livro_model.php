<?php 
    class Livro_model extends CI_Model {
        private $tableName = "livro";

        public $id;
        public $nome;
        public $sinopse;

        public function create(){
            $this->db->insert($this->tableName, $this);
        }

        public function read($id=null){
            if($id != null) $this->db->where('id', $id);
            $query = $this->db->get($this->tableName);
            return $query->result();
        }

        public function update(){
            $this->db->where('id', $this->id);
            $this->db->update($this->tableName, $this);
        }

        public function delete(){
            $this->db->where('id', $this->id);
            $this->db->delete($this->tableName);
        }
    }
?>