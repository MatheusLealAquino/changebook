<?php
    class UsuarioLivro_model extends CI_Model {
        private $tableName = "usuarioLivro";

        public $idUsuario;
        public $idLivro;

        public function create(){
            $this->db->insert($this->tableName, $this);
        }

        public function read($idUsuario=null, $idLivro=null){
            if($idUsuario != null && $idLivro != null) {
                $this->db->where('idUsuario', $idUsuario);
                $this->db->where('idLivro', $idLivro);                
            }
            $query = $this->db->get($this->tableName);
            return $query->result_array();
        }

        public function update(){
            $this->db->where('id', $this->id);
            $this->db->update($this->tableName, $this);
        }

        public function delete(){
            $this->db->where('idUsuario', $this->idUsuario);
            $this->db->where('idLivro', $this->idLivro);
            $this->db->delete($this->tableName);
        }
    }
?>