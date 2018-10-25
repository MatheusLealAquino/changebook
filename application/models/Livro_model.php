<?php 
    class Livro_model extends CI_Model {
        private $tableName = "livro";

        public $id;
        public $nome;
        public $sinopse;

        public function create(){
            return $this->db->insert($this->tableName, $this);
        }

        public function read($id=null){
            if($id != null) $this->db->where('id', $id);
            $query = $this->db->get($this->tableName);
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
    }
?>