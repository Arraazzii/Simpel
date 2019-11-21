<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardLPK extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_DashboardLPK", "model");

		if ($this->session->userdata('username') != true) {
			$this->session->set_flashdata('notif_login', '<script>toastr.warning("Anda Tidak Memiliki Akses !", "Warning !", {"timeOut": "2000","extendedTImeout": "0"});</script>');
			redirect('');
		} else if ($this->session->userdata('level') != "User") {
			$this->session->set_flashdata('notif_login', '<script>toastr.warning("Anda Tidak Memiliki Akses !", "Warning !", {"timeOut": "2000","extendedTImeout": "0"});</script>');
			redirect('Dashboard');
		}
	}

	private function load($title = '', $datapath = '')
	{
		$page = array(
			"head" => $this->load->view('dashboard/template/head', array("title" => $title), true),
			"footer" => $this->load->view('dashboard/template/footer', false, true),
			"sidebar" => $this->load->view('dashboard/template/sidebar', false, true),
		);
		return $page;
	}

	public function index()
	{
		$kode = $this->session->userdata['kode'];
		$profil = array(
			'lpkblkln' => $this
			->model
			->dataLPK($kode)
		);
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Dashboard", $path),
			"content" => $this->load->view('dashboardLPK/profil', $profil, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function profil()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - My Profil", $path),
			"content" => $this->load->view('dashboardLPK/profil', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function ubahProfil() {
		// Data LPK/BLKLN
		$kode 		= $this->input->post('kode');
		$nama 		= $this->input->post('nama');
		$alamat 	= $this->input->post('alamat');
		$no_telepon = $this->input->post('no_telepon');
		$email	 	= $this->input->post('email');
		$no_izin 	= $this->input->post('no_izin');
		$tgl_izin 	= $this->input->post('tgl_izin');
		$jenis 		= $this->input->post('jenis');
		$status_a 	= $this->input->post('status_akreditas'); 
		$no_a 		= $this->input->post('no_akreditas');
		$ruang 	 	= $this->input->post('ruang_lingkup');
		// Data Pimpinan
		$nama_p 	= $this->input->post('nama_pimpinan');
		$telp_p		= $this->input->post('no_telepon_pimpinan');
		$nama_pj	= $this->input->post('nama_pj');
		$jabatan 	= $this->input->post('jabatan_pj');
		$telp_pj	= $this->input->post('no_telepon_pj');
		// Data Anggota
		$id = $this->input->post('id');//array
		$jumlah = $this->input->post('jumlah');//array

		$updateArray = array();

		for ($i=0; $i < sizeof($id) ; $i++) { 
			$updateArray[] = array(
				'id'=>$id[$i],
				'jumlah' => $jumlah[$i]
			);
		}

		$data = array(
			'nama' => $nama,		
			'alamat' => $alamat,
			'telepon	' => $no_telepon,
			'email' => $email,	 	
			'no_izin' => $no_izin, 	
			'tanggal_izin' => $tgl_izin, 	
			'jenis' => $jenis, 		
			'status_akreditas' => $status_a,	
			'no_akreditas' => $no_a,	
			'ruang_lingkup' => $ruang
		);

		$dataPengurus = array(
			'nama_pimpinan' => $nama_p,
			'no_telepon_pimpinan' => $telp_p,
			'nama_pj' => $nama_pj,
			'jabatan_pj' => $jabatan,
			'no_telepon_pj' => $telp_pj
		);

		$this->db->update_batch('table_anggota', $updateArray, 'id');
		$this->db->where('kode_user', $kode);
		$this->db->update('table_user', $data);
		$this->db->where('kode_user', $kode);
		$this->db->update('table_pengurus', $dataPengurus);
		$this->session->set_flashdata('notif', '<script>toastr.success("Data Anda Telah Tersimpan!", "Success", {"timeOut": "2000","extendedTImeout": "0"});</script>');
		redirect('DashboardLPK');
	}

	public function kegiatan()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Kegiatan Dan Pelatihan", $path),
			"content" => $this->load->view('dashboardLPK/kegiatan', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function peserta()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Peserta", $path),
			"content" => $this->load->view('dashboardLPK/peserta', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function kemitraan()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Kemitraan", $path),
			"content" => $this->load->view('dashboardLPK/kemitraan', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function laporan()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Laporan", $path),
			"content" => $this->load->view('dashboardLPK/laporan', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function kendalasolusi()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Kendala Dan Solusi", $path),
			"content" => $this->load->view('dashboardLPK/kendalasolusi', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

}
