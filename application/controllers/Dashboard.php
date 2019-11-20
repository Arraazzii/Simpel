<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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
		$pelatihan = array(
			'jenis' => $this
            ->model
            ->dataJenis(),
            'kategori' => $this
            ->model
            ->dataKategori(),
            'pelatihan' => $this
            ->model
            ->dataPelatihan()
		);
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Pelatihan Dan Kegiatan", $path),
			"content" => $this->load->view('dashboard/pelatihan', $pelatihan, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function aktifkanPelatihan(){
	    $idPelatihan = $this->input->post("idPelatihan");

	    $data = array(
	        'status' => 'Aktif',
	    );
	    
	    $this->db->where('kode_pelatihan', $idPelatihan);
	    $update = $this->db->update('table_pelatihan', $data);
	    if ($update) {
	        echo json_encode('ok');
	    }
	}

	public function nonAktifkanPelatihan(){
	    $idPelatihan = $this->input->post("idPelatihan");

	    $data = array(
	        'status' => 'Tidak Aktif',
	    );
	    
	    $this->db->where('kode_pelatihan', $idPelatihan);
	    $update = $this->db->update('table_pelatihan', $data);
	    if ($update) {
	        echo json_encode('ok');
	    }
	}

	public function lulusPeserta(){
	    $idUser = $this->input->post("idUser");
	    $idPelatihan = $this->input->post("idPelatihan");
	    $id = $this->input->post("id");

	    $data = array(
	        'status' => 1,
	    );
	    
	    $this->db->where('nik', $idUser);
	    $this->db->where('kode_pelatihan', $idPelatihan);
	    $this->db->where('id', $id);
	    $update = $this->db->update('table_peserta_pelatihan', $data);
	    if ($update) {
	        echo json_encode('ok');
	    }
	}

	public function batalPeserta(){
	    $idUser = $this->input->post("idUser");
	    $idPelatihan = $this->input->post("idPelatihan");
	    $id = $this->input->post("id");

	    $data = array(
	        'status' => 0,
	    );
	    
	    $this->db->where('nik', $idUser);
	    $this->db->where('kode_pelatihan', $idPelatihan);
	    $this->db->where('id', $id);
	    $update = $this->db->update('table_peserta_pelatihan', $data);
	    if ($update) {
	        echo json_encode('ok');
	    }
	}

	public function tambahPelatihan() {
		$ss = $this->session->userdata['kode'];
		$kode = $this->tools->get_kode_pelatihan();
		$nama = $this->input->post('nama');
		$jenis = $this->input->post('jenis');
		$kuota = $this->input->post('kuota');
		$kategori = $this->input->post('kategori');
		$standar = $this->input->post('standar');
		$ket = $this->input->post('ket');
		$tgl_a = $this->input->post('tgl_mulai_daftar');
		$tgl_b = $this->input->post('tgl_akhir_daftar');
		$tgl_c = $this->input->post('tgl_mulai_pel');
		$tgl_d = $this->input->post('tgl_akhir_pel');

		$data = array(
			'kode_pelatihan' => $kode,
			'nama' => $nama,
			'kode_jenis' => $jenis,
			'kuota' => $kuota,
			'kode_kategori' => $kategori,
			'standar_kompetensi' => $standar,
			'keterangan' => $ket,
			'tanggal_mulai_daftar' => $tgl_a,
			'tanggal_berakhir_daftar' => $tgl_b,
			'tanggal_mulai_pelatihan' => $tgl_c,
			'tanggal_berakhir_pelatihan' => $tgl_d,
			'kode_user' => $ss
		);

		$dataHistory = array(
			'aktivitas'  => 'Tambah Pelatihan : '.$$kode,
			'detail' => json_encode($data),
			'kode_user' => $ss
		);

		$this->db->insert('table_pelatihan', $data);
		$this->db->insert('table_history', $dataHistory);
		$this->session->set_flashdata('notif', '<script>toastr.success("Data Anda Telah Tersimpan!", "Success", {"timeOut": "2000","extendedTImeout": "0"});</script>');
		redirect('Dashboard/pelatihan');
	}

	public function ubahPelatihan() {
		$id = $this->input->post('id');
		$ss = $this->session->userdata['kode'];
		$nama = $this->input->post('nama');
		$jenis = $this->input->post('jenis');
		$kuota = $this->input->post('kuota');
		$kategori = $this->input->post('kategori');
		$standar = $this->input->post('standar');
		$ket = $this->input->post('ket');
		$tgl_a = $this->input->post('tgl_mulai_daftar');
		$tgl_b = $this->input->post('tgl_akhir_daftar');
		$tgl_c = $this->input->post('tgl_mulai_pel');
		$tgl_d = $this->input->post('tgl_akhir_pel');

		$data = array(
			'nama' => $nama,
			'kode_jenis' => $jenis,
			'kuota' => $kuota,
			'kode_kategori' => $kategori,
			'standar_kompetensi' => $standar,
			'keterangan' => $ket,
			'tanggal_mulai_daftar' => $tgl_a,
			'tanggal_berakhir_daftar' => $tgl_b,
			'tanggal_mulai_pelatihan' => $tgl_c,
			'tanggal_berakhir_pelatihan' => $tgl_d,
			'kode_user' => $ss
		);

		$dataHistory = array(
			'aktivitas'  => 'Ubah Pelatihan : '.$$kode,
			'detail' => json_encode($data),
			'kode_user' => $ss
		);

		$this->db->where('kode_pelatihan', $id);
		$this->db->update('table_pelatihan', $data);
		$this->db->insert('table_history', $dataHistory);
		$this->session->set_flashdata('notif', '<script>toastr.success("Data Anda Telah Tersimpan!", "Success", {"timeOut": "2000","extendedTImeout": "0"});</script>');
		redirect('Dashboard/pelatihan');
	}

	public function jenisPelatihan()
	{
		$jenis = array(
			'jenis' => $this
            ->model
            ->dataJenis()
		);
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Pelatihan Dan Kegiatan", $path),
			"content" => $this->load->view('dashboard/jenispelatihan', $jenis, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function tambahJenisPelatihan() {
		$jenis = $this->input->post('jenis');
		$ss = $this->session->userdata['kode'];
		$kode = $this->tools->get_kode_jenis();

		$data = array(
			'kode_jenis' => $kode,
			'jenis' => $jenis
		);

		$dataHistory = array(
			'aktivitas'  => 'Tambah Jenis Pelatihan : '.$jenis,
			// 'detail' => json_encode($data),
			'kode_user' => $ss
		);

		$this->db->insert('table_jenis', $data);
		$this->db->insert('table_history', $dataHistory);
		$this->session->set_flashdata('notif', '<script>toastr.success("Data Anda Telah Tersimpan!", "Success", {"timeOut": "2000","extendedTImeout": "0"});</script>');
		redirect('Dashboard/jenisPelatihan');
	}

	public function ubahJenis() {
		$id = $this->input->post('id');
		$jenis = $this->input->post('jenis');
		$ss = $this->session->userdata['kode'];

		$data = array(
			'jenis' => $jenis
		);

		$dataHistory = array(
			'aktivitas'  => 'Ubah Jenis Pelatihan : '.$id,
			// 'detail' => json_encode($data),
			'kode_user' => $ss
		);

		$this->db->where('kode_jenis', $id);
		$this->db->update('table_jenis', $data);
		$this->db->insert('table_history', $dataHistory);
		$this->session->set_flashdata('notif', '<script>toastr.success("Data Anda Telah Tersimpan!", "Success", {"timeOut": "2000","extendedTImeout": "0"});</script>');
		redirect('Dashboard/jenisPelatihan');
	}

	public function kategoriPelatihan()
	{
		$kategori = array(
			'kategori' => $this
            ->model
            ->dataKategori()
		);
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Pelatihan Dan Kegiatan", $path),
			"content" => $this->load->view('dashboard/kategoripelatihan', $kategori, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function tambahKategoriPelatihan() {
		$jenis = $this->input->post('jenis');
		$ss = $this->session->userdata['kode'];
		$kode = $this->tools->get_kode_kategori();

		$data = array(
			'kode_kategori' => $kode,
			'kategori' => $jenis
		);

		$dataHistory = array(
			'aktivitas'  => 'Tambah Kategori Pelatihan : '.$jenis,
			// 'detail' => json_encode($data),
			'kode_user' => $ss
		);

		$this->db->insert('table_kategori', $data);
		$this->db->insert('table_history', $dataHistory);
		$this->session->set_flashdata('notif', '<script>toastr.success("Data Anda Telah Tersimpan!", "Success", {"timeOut": "2000","extendedTImeout": "0"});</script>');
		redirect('Dashboard/kategoriPelatihan');
	}

	public function ubahKategori() {
		$id = $this->input->post('id');
		$jenis = $this->input->post('jenis');
		$ss = $this->session->userdata['kode'];

		$data = array(
			'kategori' => $jenis
		);

		$dataHistory = array(
			'aktivitas'  => 'Ubah Kategori Pelatihan : '.$id,
			// 'detail' => json_encode($data),
			'kode_user' => $ss
		);

		$this->db->where('kode_kategori', $id);
		$this->db->update('table_kategori', $data);
		$this->db->insert('table_history', $dataHistory);
		$this->session->set_flashdata('notif', '<script>toastr.success("Data Anda Telah Tersimpan!", "Success", {"timeOut": "2000","extendedTImeout": "0"});</script>');
		redirect('Dashboard/kategoriPelatihan');
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
		$user = array(
			'lpkblkln' => $this
            ->model
            ->dataLPK()
		);
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - User", $path),
			"content" => $this->load->view('dashboard/user', $user, true),
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
		$kode = $this->session->userdata['kode'];
		$aktivitas = array(
            'history' => $this
            ->model
            ->dataHistory($kode),
            'historyAdmin' => $this
            ->model
            ->dataHistoryAdmin($kode),
        );
		$kode = 
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Aktivitas Terbaru", $path),
			"content" => $this->load->view('dashboard/aktivitas', $aktivitas, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function peserta()
	{
		$peserta = array(
			'pesertaPelatihan' => $this
            ->model
            ->dataPesertaPelatihan()
		);
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Daftar Peserta", $path),
			"content" => $this->load->view('dashboard/peserta', $peserta, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function ubahPeserta() {
		$id = $this->input->post('id');
		$ss = $this->session->userdata['kode'];
		$status_kerja = $this->input->post('status_pekerjaan');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$telpon = $this->input->post('telp');

		$data = array(
			'status_pekerjaan' => $status_kerja,
			'nama_perusahaan' => $nama,
			'alamat_perusahaan' => $alamat,
			'no_telp_perusahaan' => $telpon
		);

		$dataHistory = array(
			'aktivitas'  => 'Ubah Peserta : '.$id,
			'detail' => json_encode($data),
			'kode_user' => $ss
		);

		$this->db->where('nik', $id);
		$this->db->update('table_peserta', $data);
		$this->db->insert('table_history', $dataHistory);
		$this->session->set_flashdata('notif', '<script>toastr.success("Data Anda Telah Tersimpan!", "Success", {"timeOut": "2000","extendedTImeout": "0"});</script>');
		redirect('Dashboard/peserta');
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

  public function laporan1()
  {
		$tgl_awal 			= $this->input->post("tgl_awal");
		$tgl_akhir 	 		= $this->input->post("tgl_akhir");
		// $tgl_awal       = $this->changeDateFormat($tgl_awal);
		// $tgl_akhir      = $this->changeDateFormat($tgl_akhir);

		$dataLaporan = $this->model->laporan1($tgl_awal, $tgl_akhir);

		$dataView = [
			'dataLaporan' => $dataLaporan,
			'tgl_awal' => date("d M Y", strtotime($tgl_awal)),
			'tgl_akhir' => date("d M Y", strtotime($tgl_akhir))
		];

		$view = $this->load->view('dashboard/laporan/laporan1', $dataView, true);
    // echo $view;
		$this->pdfgenerator->generate($view, "Laporan BKK", TRUE, 'A4', 'landscape');
  }
	
}
