<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Home extends CI_Model{ 

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function dataSlider(){
        $this->db->select('*');
        $this->db->from('table_slider');
        $this->db->where('kode_user', 'ADMIN');
        $query = $this->db->get();
        return $query->result();
    }

}