<?php
    class Foto_model extends CI_Model {
        private $tableName = "foto";

        public $id;
        public $url;
        public $idAnuncio;

        public function create(){
            $this->db->insert($this->tableName, $this);
        }

        public function read($id=null){
            if($id != null) $this->db->where('id', $this->id);
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