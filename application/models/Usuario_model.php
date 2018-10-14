<?php 
    class Usuario_model extends CI_Model {
        private $tableName = "usuario";
        
        public $id;
        public $dataCriacao;
        public $nome;
        public $email;
        public $senha;
        public $fotoPerfil;

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

        public function login(){
            $this->db->where('email', $this->email);
            $this->db->where('senha', $this->senha);
            $this->db->from($this->tableName);
            $result = $this->db->count_all_results();
            return $result == 1 ? true : false;
        }
    }
?>