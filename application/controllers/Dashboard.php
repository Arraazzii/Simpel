<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Dashboard", "model");
		$this->load->model("M_Tools", "tools");

		if ($this->session->userdata('username') != true) {
			$this->session->set_flashdata('notif_login', '<script>toastr.warning("Anda Tidak Memiliki Akses !", "Warning !", {"timeOut": "2000","extendedTImeout": "0"});</script>');
			redirect('');
		} else if ($this->session->userdata('username') == true && $this->session->userdata('level') != "Admin") {
			$this->session->set_flashdata('notif_login', '<script>toastr.warning("Anda Tidak Memiliki Akses !", "Warning !", {"timeOut": "2000","extendedTImeout": "0"});</script>');
			redirect('DashboardLPK');
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
		$index = array(
            'jumlahLPK' => $this
            ->model
            ->jumlahLPK(),
            'jumlahBLKLN' => $this
            ->model
            ->jumlahBLKLN(),
            'jumlahKegiatan' => $this
            ->model
            ->jumlahKegiatan(),
            'jumlahPeserta' => $this
            ->model
            ->jumlahPeserta(),
        );
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Dashboard", $path),
			"content" => $this->load->view('dashboard/index', $index, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function lpkblkln()
	{
		$lpkblkln = array(
			'lpkblkln' => $this
            ->model
            ->dataLPK()
		);
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - LPK BLKLN", $path),
			"content" => $this->load->view('dashboard/lpkblkln', $lpkblkln, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

		public function buatAkunLPK() {
		// Kode User 
		$kode       = $this->tools->get_kode_user();
		// Data Login
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
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
		$tipe 		= $this->input->post('tipe');
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


		$dataLogin = array(
			'username' => $username,
			'password' => md5($password),
			'level' => 'User',
			'status' => 'Aktif',
			'kode_user' => $kode
		);

		$data = array(
			'kode_user' => $kode,
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
			'tipe' => $tipe,
			'photo' => $_FILES['logo']['name']
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
			'aktivitas'  => 'Daftar : '.$nama,
			'detail' => json_encode($data),
			'photo' => $_FILES['logo']['name'],
			'kode_user' => $kode
		);

		move_uploaded_file($_FILES['logo']['tmp_name'], './assets/upload/logo/' . $_FILES['logo']['name']);
		$this->db->insert("table_login", $dataLogin);
		$this->db->insert("table_pengurus", $dataPengurus);
		$this->db->insert("table_user", $data);
		$this->db->insert_batch("table_anggota", $dataAnggota);
		$this->db->insert("table_history", $dataHistory);
		$this->session->set_flashdata('notif', '<script>toastr.success("Data Anda Telah Tersimpan!", "Success", {"timeOut": "2000","extendedTImeout": "0"});</script>');
		redirect('Dashboard/lpkblkln');
	}

	public function aktivasiAkun() {
		$id = $this->input->post('id');
		$ss = $this->session->userdata['kode'];
		$dataLPK = $this->model->LPK($id);

		$data = array(
			'status' => 'Aktif'
		);

		$dataHistory = array(
			'aktivitas'  => 'Aktivasi Akun : '.$id,
			'detail' => json_encode($dataLPK),
			'kode_user' => $ss
		);

		$this->db->where('kode_user', $id);
		$this->db->update('table_login', $data);
		$this->db->insert('table_history', $dataHistory);
	}

	public function blokirAkun() {
		$id = $this->input->post('id');
		$ss = $this->session->userdata['kode'];
		$dataLPK = $this->model->LPK($id);

		$data = array(
			'status' => 'Suspend'
		);

		$dataHistory = array(
			'aktivitas'  => 'Blokir Akun : '.$id,
			'detail' => json_encode($dataLPK),
			'kode_user' => $ss
		);

		$this->db->where('kode_user', $id);
		$this->db->update('table_login', $data);
		$this->db->insert('table_history', $dataHistory);
	}

	public function hapusAkun() {
		$id = $this->input->post('id');
		$data = $this->model->LPK($id);
		$ss = $this->session->userdata['kode'];

		$this->db->where('kode_user', $id);
		$this->db->delete('table_login');
		$this->db->where('kode_user', $id);
		$this->db->delete('table_user');
		$this->db->where('kode_user', $id);
		$this->db->delete('table_pengurus');
		$this->db->where('kode_user', $id);
		$this->db->delete('table_anggota');
		$this->db->where('kode_user', $id);
		$this->db->delete('table_berita');
		$this->db->where('kode_user', $id);
		$this->db->delete('table_pelatihan');
		$this->db->where('kode_user', $id);
		$this->db->delete('table_slider');

		unlink('assets/upload/logo/'.$data->photo);

		$dataHistory = array(
			'aktivitas'  => 'Hapus Akun : '.$id,
			'detail' => json_encode($data),
			'kode_user' => $ss
		);

		$this->db->insert('table_history', $dataHistory);
	}

	public function pelatihan()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Pelatihan Dan Kegiatan", $path),
			"content" => $this->load->view('dashboard/pelatihan', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function info()
	{
		$kode = $this->session->userdata['kode'];
		$berita = array(
            'berita' => $this
            ->model
            ->dataBerita(),
        );
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Informasi", $path),
			"content" => $this->load->view('dashboard/info', $berita, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function tambahBerita(){
		$kode       = $this->session->userdata['kode'];
		$tipe 		= $this->input->post('tipe');
		$judul      = $this->input->post('judul');
		$deskripsi  = $this->input->post('deskripsi');

		$data = array(
			'tipe' => $tipe,
			'judul' => $judul,
			'detail' => $deskripsi,
			'photo' => $_FILES['foto']['name'],
			'kode_user' => $kode
		);

		$dataHistory = array(
			'aktivitas'  => 'Tambah Berita/Events : '.$judul,
			'detail' => $deskripsi,
			'photo' => $_FILES['foto']['name'],
			'kode_user' => $kode
		);

		move_uploaded_file($_FILES['foto']['tmp_name'], './assets/upload/berita/' . $_FILES['foto']['name']);
		$this->db->insert("table_berita", $data);
		$this->db->insert("table_history", $dataHistory);
		$this->session->set_flashdata('notif', '<script>toastr.success("Data Anda Telah Tersimpan!", "Success", {"timeOut": "2000","extendedTImeout": "0"});</script>');
		redirect('Dashboard/info');
	}

	public function laporan()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Laporan", $path),
			"content" => $this->load->view('dashboard/laporan', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function user()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - User", $path),
			"content" => $this->load->view('dashboard/user', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function slider()
	{
		$kode = $this->session->userdata['kode'];
		$slider = array(
            'slider' => $this
            ->model
            ->dataSlider($kode),
        );
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Slider", $path),
			"content" => $this->load->view('dashboard/slider', $slider, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function tambahSlider(){
		$kode       = $this->session->userdata['kode'];
		$judul      = $this->input->post('judul');
		$deskripsi  = $this->input->post('deskripsi');

		$data = array(
			'judul' => $judul,
			'detail' => $deskripsi,
			'photo' => $_FILES['foto']['name'],
			'kode_user' => $kode
		);

		$dataHistory = array(
			'aktivitas'  => 'Tambah Slider : '. $judul,
			'detail' => $deskripsi,
			'photo' => $_FILES['foto']['name'],
			'kode_user' => $kode
		);

		move_uploaded_file($_FILES['foto']['tmp_name'], './assets/upload/slider/' . $_FILES['foto']['name']);
		$this->db->insert("table_slider", $data);
		$this->db->insert("table_history", $dataHistory);
		$this->session->set_flashdata('notif', '<script>toastr.success("Data Anda Telah Tersimpan!", "Success", {"timeOut": "2000","extendedTImeout": "0"});</script>');
		redirect('Dashboard/slider');
	}

	public function editSlider(){
		$id      	= $this->input->post('id');
		$kode       = $this->session->userdata['kode'];
		$judul      = $this->input->post('judul');
		$deskripsi  = $this->input->post('deskripsi');

		$data = array(
			'judul' => $judul,
			'detail' => $deskripsi,
			'photo' => $_FILES['foto']['name'],
		);

		$dataHistory = array(
			'aktivitas'  => 'Ubah Slider : '. $judul,
			'photo' => $_FILES['foto']['name'],
			'detail' => $deskripsi.', Dengan ID Slider : '.$id,
			'kode_user' => $kode
		);

		move_uploaded_file($_FILES['foto']['tmp_name'], './assets/upload/slider/' . $_FILES['foto']['name']);
		$this->db->where("id", $id);
		$this->db->update("table_slider", $data);
		$this->db->insert("table_history", $dataHistory);
		$this->session->set_flashdata('notif', '<script>toastr.success("Data Anda Telah Tersimpan!", "Success", {"timeOut": "2000","extendedTImeout": "0"});</script>');
		redirect('Dashboard/slider');
	}

	public function aktivitas()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Aktivitas Terbaru", $path),
			"content" => $this->load->view('dashboard/aktivitas', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function peserta()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Daftar Peserta", $path),
			"content" => $this->load->view('dashboard/peserta', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function helpdesk()
	{
		$helpdesk = array(
            'helpdesk' => $this
            ->model
            ->dataHelpDesk(),
        );
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Helpdesk", $path),
			"content" => $this->load->view('dashboard/helpdesk', $helpdesk, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}
	
}
