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

    public function dataHistory($kode){
        $this->db->select('*');
        $this->db->from('table_history');
        $this->db->where('kode_user !=', $kode);
        $this->db->limit(5);
        $this->db->order_by("waktu", "DESC");
        $query = $this->db->get();
        return $query->result();
    }

    public function dataHistoryAdmin($kode){
        $this->db->select('*');
        $this->db->from('table_history');
        $this->db->where('kode_user', $kode);
        $this->db->limit(5);
        $this->db->order_by("waktu", "DESC");
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
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function dataJenis(){
        $this->db->select('*');
        $this->db->from('table_jenis');
        $query = $this->db->get();
        return $query->result();
    }

    public function dataKategori(){
        $this->db->select('*');
        $this->db->from('table_kategori');
        $query = $this->db->get();
        return $query->result();
    }

    public function dataPelatihan(){
        $this->db->select('*');
        $this->db->from('table_pelatihan a');
        $this->db->join('table_jenis b', 'b.kode_jenis = a.kode_jenis');
        $this->db->join('table_kategori c', 'c.kode_kategori = a.kode_kategori');
        $this->db->order_by('a.kode_pelatihan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function dataPesertaPelatihan(){
        $this->db->select('b.nik nik,b.nama, b.status_pekerjaan status, b.no_telepon hp, d.kelurahan kel, d.kecamatan kec, d.alamat alamat, c.nama nama_pelatihan, b.nama_perusahaan, b.alamat_perusahaan, b.no_telp_perusahaan');
        $this->db->from('table_peserta_pelatihan a');
        $this->db->join('table_peserta b', 'b.nik = a.nik');
        $this->db->join('table_pelatihan c', 'c.kode_pelatihan = a.kode_pelatihan');
        $this->db->join('table_alamat d', 'd.kode_alamat = b.kode_alamat');
        $this->db->order_by('a.id', 'DESC');
        $this->db->where('a.status !=', '0');
        $query = $this->db->get();
        return $query->result();
    }

    public function dataLPK(){
        $this->db->select('*');
        $this->db->from('table_user a');
        $this->db->join('table_login b', 'b.kode_user = a.kode_user');
        $this->db->join('table_pengurus c', 'c.kode_user = a.kode_user');
        $this->db->order_by('b.created_date', 'DESC');
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