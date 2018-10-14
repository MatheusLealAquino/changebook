<?php 
    class Auth_model extends CI_Model {

        public function login($email, $senha){
            $this->db->where('email', $email);
            $this->db->where('senha', $senha);
            $this->db->from('usuario');
            $result = $this->db->count_all_results();
            return $result == 1 ? true : false;
        }
    }