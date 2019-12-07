<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardLPK extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_DashboardLPK", "model");
		$this->load->model("M_Tools", "tools");

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
			"content" => $this->load->view('dashboardLPK/index', $profil, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function profil()
	{
		$kode = $this->session->userdata['kode'];
		$profil = array(
			'lpkblkln' => $this
			->model
			->dataLPK($kode)
		);
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - My Profil", $path),
			"content" => $this->load->view('dashboardLPK/profil', $profil, true),
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
			'ruang_lingkup' => $ruang,
			'photo' => $_FILES['logo']['name']
		);

		$dataPengurus = array(
			'nama_pimpinan' => $nama_p,
			'no_telepon_pimpinan' => $telp_p,
			'nama_pj' => $nama_pj,
			'jabatan_pj' => $jabatan,
			'no_telepon_pj' => $telp_pj
		);

		move_uploaded_file($_FILES['logo']['tmp_name'], './assets/upload/logo/' . $_FILES['logo']['name']);
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
		$kode = $this->session->userdata['kode'];
		$laporan = array(
			'laporan' => $this->model->dataLaporan($kode),
			'lpkblkln' => $this->model->dataLPK($kode),

		);
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Laporan", $path),
			"content" => $this->load->view('dashboardLPK/laporan', $laporan, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function updateLaporan() {
		$id 		= $this->session->userdata['kode'];
		$kode       = $this->tools->get_kode_laporan();
		$date 		= date('Y-m-d');
		// Data LPK/BLKLN
		$nama 		= $this->input->post('nama');
		$alamat 	= $this->input->post('alamat');
		$no_telepon = $this->input->post('no_telepon');
		$email	 	= $this->input->post('email');
		$no_izin 	= $this->input->post('no_izin');
		$tgl_izin 	= $this->input->post('tanggal_izin');
		$jenis 		= $this->input->post('jenis');
		$status_a 	= $this->input->post('status_akreditas'); 
		$no_a 		= $this->input->post('no_akreditas');
		$ruang 	 	= $this->input->post('ruang_lingkup');
		$program 	= $this->input->post('program');
		// Data Pimpinan
		$nama_p 	= $this->input->post('nama_pimpinan');
		$telp_p		= $this->input->post('no_telepon_pimpinan');
		$nama_pj	= $this->input->post('nama_pj');
		$jabatan 	= $this->input->post('jabatan_pj');
		$telp_pj	= $this->input->post('no_telepon_pj');
		// Data Anggota
		$karyawan_l = $this->input->post('karyawan_laki');
		$karyawan_p = $this->input->post('karyawan_perempuan');
		$tpt_l 		= $this->input->post('tpt_laki');
		$tpt_p 		= $this->input->post('tpt_perempuan');
		$tptt_l 	= $this->input->post('tptt_laki');
		$tptt_p 	= $this->input->post('tptt_perempuan');
		$it_l 		= $this->input->post('it_laki');
		$it_p 		= $this->input->post('it_perempuan');
		$itt_l 		= $this->input->post('itt_laki');
		$itt_p 		= $this->input->post('itt_perempuan');
		$ak_l 		= $this->input->post('ak_laki');
		$ak_p 		= $this->input->post('ak_perempuan');
		$aw_l 		= $this->input->post('aw_laki');
		$aw_p 		= $this->input->post('aw_perempuan');

		$data = array(
			'kode_lapor' => $kode,
			'nama' => $nama,		
			'alamat' => $alamat,
			'telepon	' => $no_telepon,
			'email' => $email,	 	
			'no_izin' => $no_izin, 	
			'tanggal_izin' => $tgl_izin, 	
			'jenis' => $jenis, 		
			'status_akreditas' => $status_a,	
			'no_akreditas' => $no_a,	
			'ruang_lingkup' => $ruang,
			'program' => $program,
			'photo' => $_FILES['kegiatan']['name'],
			'absensi' => $_FILES['absensi']['name'],
			'kode_user' => $id
		);

		$dataPengurus = array(
			'nama_pimpinan' => $nama_p,
			'no_telepon_pimpinan' => $telp_p,
			'nama_pj' => $nama_pj,
			'jabatan_pj' => $jabatan,
			'no_telepon_pj' => $telp_pj,
			'kode_user' => $kode
		);

		$dataAnggota = array(
			array(
				'tipe' => 'Karyawan',
				'jenis_kelamin' => 'Laki-laki',
				'jumlah' => $karyawan_l,
				'kode_user' => $kode
			),
			array(
				'tipe' => 'Karyawan',
				'jenis_kelamin' => 'Perempuan',
				'jumlah' => $karyawan_p,
				'kode_user' => $kode
			),
			array(
				'tipe' => 'Tenaga Pelatihan Tetap',
				'jenis_kelamin' => 'Laki-laki',
				'jumlah' => $tpt_l,
				'kode_user' => $kode
			),
			array(
				'tipe' => 'Tenaga Pelatihan Tetap',
				'jenis_kelamin' => 'Perempuan',
				'jumlah' => $tpt_p,
				'kode_user' => $kode
			),
			array(
				'tipe' => 'Tenaga Pelatihan Tidak Tetap',
				'jenis_kelamin' => 'Laki-laki',
				'jumlah' => $tptt_l,
				'kode_user' => $kode
			),
			array(
				'tipe' => 'Tenaga Pelatihan Tidak Tetap',
				'jenis_kelamin' => 'Perempuan',
				'jumlah' => $tptt_p,
				'kode_user' => $kode
			),
			array(
				'tipe' => 'Instruktur Tetap',
				'jenis_kelamin' => 'Laki-laki',
				'jumlah' => $it_l,
				'kode_user' => $kode
			),
			array(
				'tipe' => 'Instruktur Tetap',
				'jenis_kelamin' => 'Perempuan',
				'jumlah' => $it_p,
				'kode_user' => $kode
			),
			array(
				'tipe' => 'Instruktur Tidak Tetap',
				'jenis_kelamin' => 'Laki-laki',
				'jumlah' => $itt_l,
				'kode_user' => $kode
			),
			array(
				'tipe' => 'Instruktur Tidak Tetap',
				'jenis_kelamin' => 'Perempuan',
				'jumlah' => $itt_p,
				'kode_user' => $kode
			),
			array(
				'tipe' => 'Asesor Kompetensi',
				'jenis_kelamin' => 'Laki-laki',
				'jumlah' => $ak_l,
				'kode_user' => $kode
			),
			array(
				'tipe' => 'Asesor Kompetensi',
				'jenis_kelamin' => 'Perempuan',
				'jumlah' => $ak_p,
				'kode_user' => $kode
			),
			array(
				'tipe' => 'Instruktur/Asesor WNA',
				'jenis_kelamin' => 'Laki-laki',
				'jumlah' => $aw_l,
				'kode_user' => $kode
			),
			array(
				'tipe' => 'Instruktur/Asesor WNA',
				'jenis_kelamin' => 'Perempuan',
				'jumlah' => $aw_p,
				'kode_user' => $kode
			),
		);

		$dataHistory = array(
			'aktivitas'  => 'Update Laporan : '.$nama,
			'detail' => json_encode($data),
			'kode_user' => $id
		);

		$dataHistoryLaporan = array(
			'tanggal_lapor' => $date,
			'kode_user' => $id,
			'kode_lapor' => $kode
		);

		move_uploaded_file($_FILES['kegiatan']['tmp_name'], './assets/upload/laporan/' . $_FILES['kegiatan']['name']);
		move_uploaded_file($_FILES['absensi']['tmp_name'], './assets/upload/laporan/' . $_FILES['absensi']['name']);
		$this->db->insert("table_pengurus", $dataPengurus);
		$this->db->insert("table_lapor_detail", $data);
		$this->db->insert_batch("table_anggota", $dataAnggota);
		$this->db->insert("table_history", $dataHistory);
		$this->db->insert("table_laporan", $dataHistoryLaporan);
		$this->session->set_flashdata('notif', '<script>toastr.success("Data Anda Telah Tersimpan!", "Success", {"timeOut": "2000","extendedTImeout": "0"});</script>');
		redirect('DashboardLPK/laporan');
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
