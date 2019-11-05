<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Tools extends CI_Model{ 

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    // public function read(){
    //     $this->db->select('*');
    //     $this->db->from('table_login');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function readBy($email, $password){
        $this->db->select('*');
        $this->db->from('table_login');
        $this->db->where('username', $email);
        $this->db->where('password', $password);
        $query = $this->db->get();
        return $query->row();
    }

}