<?php
    class TagAnuncio_model extends CI_Model {
        private $tableName = "tagAnuncio";

        public $idTag;
        public $idAnuncio;

        public function create(){
            return $this->db->insert($this->tableName, $this);
        }

        public function read($idAnuncio=null){
            if($idAnuncio != null) {
                $this->db->where('idAnuncio', $idAnuncio);                
            }
            $query = $this->db->get($this->tableName);
            return $query->result_array();
        }

        public function update(){
            $this->db->where('id', $this->id);
            return $this->db->update($this->tableName, $this);
        }

        public function delete(){
            $this->db->where('idTag', $this->idTag);
            $this->db->where('idAnuncio', $this->idAnuncio);
            return $this->db->delete($this->tableName);
        }
    }
?>