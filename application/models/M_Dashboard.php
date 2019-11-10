<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Dashboard extends CI_Model{ 

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function dataSlider($kode){
        $this->db->select('*');
        $this->db->from('table_slider');
        $this->db->where('kode_user', $kode);
        $query = $this->db->get();
        return $query->result();
    }

    public function dataHelpDesk(){
    	$this->db->select('*');
        $this->db->from('table_helpdesk');
        $query = $this->db->get();
        return $query->result();
    }

    public function dataBerita(){
    	$this->db->select('*');
        $this->db->from('table_berita');
        $query = $this->db->get();
        return $query->result();
    }

    public function dataLPK(){
        $this->db->select('*');
        $this->db->from('table_user a');
        $this->db->join('table_login b', 'b.kode_user = a.kode_user');
        $this->db->join('table_pengurus c', 'c.kode_user = a.kode_user');
        $query = $this->db->get();
        return $query->result();
    }

    public function LPK($kode){
        $this->db->select('*');
        $this->db->from('table_user a');
        $this->db->join('table_login b', 'b.kode_user = a.kode_user');
        $this->db->join('table_pengurus c', 'c.kode_user = a.kode_user');
        $this->db->where('a.kode_user', $kode);
        $query = $this->db->get();
        return $query->result();
    }

    public function jumlahLPK(){
        $query = $this->db->query("SELECT COUNT(COALESCE(kode_user, 0)) as total FROM table_user WHERE tipe='LPK'");
        return $query->result_array();
    }

    public function jumlahBLKLN(){
        $query = $this->db->query("SELECT COUNT(COALESCE(kode_user, 0)) as total FROM table_user WHERE tipe='BLKLN'");
        return $query->result_array();
    }

    public function jumlahKegiatan(){
        $query = $this->db->query("SELECT COUNT(COALESCE(kode_pelatihan, 0)) as total FROM table_pelatihan");
        return $query->result_array();
    }

    public function jumlahPeserta(){
        $query = $this->db->query("SELECT COUNT(COALESCE(nik, 0)) as total FROM table_peserta");
        return $query->result_array();
    }
}