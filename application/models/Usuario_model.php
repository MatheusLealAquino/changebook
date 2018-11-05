<?php 
    class Usuario_model extends CI_Model {
        private $tableName = "usuario";
        
        public $id;
        public $dataCriacao;
        public $nomeUsuario;
        public $email;
        public $senha;
        public $fotoPerfil;

        public function create(){
            return $this->db->insert($this->tableName, $this);
        }

        public function read($id=null){
            if($id != null) $this->db->where('id', $id);
            $query = $this->db->get($this->tableName);
            return $query->result_array();
        }

        public function loginUser($email, $senha){
            $this->db->where('email', $email);
            $this->db->where('senha', $senha);
            $query = $this->db->get('usuario');
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