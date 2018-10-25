<?php
    class Emprestimo_model extends CI_Model {
        private $tableName = "emprestimo";

        public $idUsuarioDono;
        public $idUsuarioAluguel;
        public $idAnuncio;
        public $data;
        public $valor;
        public $idAnuncioTroca;
        
        public function create(){
            return $this->db->insert($this->tableName, $this);
        }

        public function read($idUsuarioDono=null, $idUsuarioAluguel=null, $idAnuncio=null){
            if($idUsuarioDono != null && $idUsuarioAluguel != null && $idAnuncio != null){
                $this->db->where('idUsuarioDono', $this->idUsuarioDono);
                $this->db->where('idUsuarioAluguel', $this->idUsuarioAluguel);
                $this->db->where('idAnuncio', $this->idAnuncio);
            }
            
            $query = $this->db->get($this->tableName);
            return $query->result_array();
        }

        public function update(){
            $this->db->where('idUsuarioDono', $this->idUsuarioDono);
            $this->db->where('idUsuarioAluguel', $this->idUsuarioAluguel);
            $this->db->where('idAnuncio', $this->idAnuncio);
            return $this->db->update($this->tableName, $this);
        }

    }
?>