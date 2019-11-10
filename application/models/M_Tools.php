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

    public function get_kode_user() {
    $kode = "";
    $this->db->select("REPLACE(kode_user, 'USER', '') as kode", FALSE);
    $this->db->order_by('(0 + kode)','DESC');
    $this->db->limit(1);
        $query = $this->db->get('table_user');//cek dulu apakah ada sudah ada kode di tabel.
        if($query->num_rows() <> 0){
           //jika kode ternyata sudah ada.
         $data = $query->row();
         $kode = intval($data->kode) + 1;
       }
       else {
           //jika kode belum ada
         $kode = 1;
       }
       return "USER".$kode;
    }


    public function get_kode_alamat() {
    $kode = "";
    $this->db->select("REPLACE(kode_alamat, 'ALM', '') as kode", FALSE);
    $this->db->order_by('(0 + kode)','DESC');
    $this->db->limit(1);
        $query = $this->db->get('table_alamat');//cek dulu apakah ada sudah ada kode di tabel.
        if($query->num_rows() <> 0){
           //jika kode ternyata sudah ada.
         $data = $query->row();
         $kode = intval($data->kode) + 1;
       }
       else {
           //jika kode belum ada
         $kode = 1;
       }
       return "ALM".$kode;
    }

    public function get_kode_pengurus() {
    $kode = "";
    $this->db->select("REPLACE(kode_user, 'USER', '') as kode", FALSE);
    $this->db->order_by('(0 + kode)','DESC');
    $this->db->limit(1);
        $query = $this->db->get('table_user');//cek dulu apakah ada sudah ada kode di tabel.
        if($query->num_rows() <> 0){
           //jika kode ternyata sudah ada.
         $data = $query->row();
         $kode = intval($data->kode) + 1;
       }
       else {
           //jika kode belum ada
         $kode = 1;
       }
       return "USER".$kode;
    }
}