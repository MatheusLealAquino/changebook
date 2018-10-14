<?php
    class TagAnuncio_model extends CI_Model {
        private $tableName = "tagAnuncio";

        public $idTag;
        public $idAnuncio;

        public function create(){
            return $this->db->insert($this->tableName, $this);
        }

        public function read($idTag=null, $idAnuncio){
            if($idTag != null && $idAnuncio != null) {
                $this->db->where('idTag', $idTag);
                $this->db->where('idAnuncio', $idAnuncio);                
            }
            $query = $this->db->get($this->tableName);
            return $query->result();
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