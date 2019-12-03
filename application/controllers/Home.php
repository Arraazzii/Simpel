<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Home", "model");
		$this->load->model("M_Tools", "tools");
		if ($this->session->userdata('username') == true && $this->session->userdata('level') == "Admin") {
			redirect('Dashboard');
		} else if ($this->session->userdata('username') == true && $this->session->userdata('level') == "User") {
			redirect('DashboardLPK');
		}
	}

	private function load($title = '', $datapath = '')
	{
		$page = array(
			"head" => $this->load->view('home/template/head', array("title" => $title), true),
			"main_js" => $this->load->view('home/template/main_js', false, true),
		);
		return $page;
	}

	public function index()
	{
		$slider = array(
            'slider' => $this
            ->model
            ->dataSlider(),
            'lpk' => $this
            ->model
            ->dataLPK(6),
            'berita' => $this
            ->model
            ->dataBerita(6),
            'pelatihan' => $this 
            ->model
            ->dataPelatihan(6),
            'jenis' => $this 
            ->model
            ->datajenis(),
        );
		$path = "";
		// $data1['model'] = $this->model->dataPelatihan();
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok", $path),
			"content" => $this->load->view('home/index', $slider, true),
		);
		$this->load->view('home/template/default_template', $data);
	}

	public function cariPelatihan(){
		$bulanpelatihan = $this->input->post("bulanpelatihan");
		$tahunpelatihan = $this->input->post("tahunpelatihan");
		$jenispelatihan = $this->input->post("jenispelatihan");
		$keypelatihan = $this->input->post("keypelatihan");

		$this->db->select("*");
        $this->db->from('table_pelatihan');
        if ($bulanpelatihan != NULL || $bulanpelatihan != "") {
        	$this->db->where('MONTH(tanggal_berakhir_daftar)', $bulanpelatihan);
        }
        if ($tahunpelatihan != NULL || $tahunpelatihan != "") {
        	$this->db->where('YEAR(tanggal_berakhir_daftar)', $tahunpelatihan);
        }
        if ($jenispelatihan != NULL || $jenispelatihan != "") {
        	$this->db->where('kode_jenis', $jenispelatihan);
        }
        if ($keypelatihan != NULL || $keypelatihan != "") {
	        $this->db->like('nama', $keypelatihan);
        }
        $this->db->order_by("kode_pelatihan", "DESC");
        $this->db->limit(6);
        $query = $this->db->get();
        echo json_encode($query->result_array());
	}

	public function carilpk(){
		$keylpk = $this->input->post("keylpk");
		$this->db->select('*');
        $this->db->from('table_user a');
        $this->db->join('table_login b', 'b.kode_user = a.kode_user');
        $this->db->join('table_pengurus c', 'c.kode_user = a.kode_user');
        if ($keylpk != NULL || $keylpk != "") {
	        $this->db->like('a.nama', $keylpk);
        }
        $this->db->order_by('b.created_date', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get();
        echo json_encode($query->result_array());
	}

	public function pelatihan()
	{
		$path = "";
		$arraydata = array(
		'pelatihan' => $this
            ->model
            ->dataPelatihan(12),
        );
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Pelatihan", $path),
			"content" => $this->load->view('home/pelatihan', $arraydata, true),
		);
		$this->load->view('home/template/default_template', $data);
	}

	public function pelatihanDetail($id)
	{
		$detail = array(
            'detail' => $this
            ->model
            ->dataPelatihanDetail($id),
            'lainnya' => $this
            ->model
            ->dataPelatihanLain($id),
        );
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Pelatihan Detail", $path),
			"content" => $this->load->view('home/pelatihanDetail', $detail, true),
		);
		$this->load->view('home/template/default_template', $data);
	}

	public function daftarPelatihan() {
		$pelatihan 	= $this->input->post('id');
		$kode_alm 	= $this->tools->get_kode_alamat();
		$date 		= date('Y-m-d');
		$nik 	 	= $this->input->post('nik');
		$kk 	 	= $this->input->post('kk');
		$ak1	 	= $this->input->post('ak1');
		$nama 		= $this->input->post('nama');
		$jk 	 	= $this->input->post('jk');
		$email 		= $this->input->post('email');
		$telepon 	= $this->input->post('no_telepon'); 
		$alamat 	= $this->input->post('alamat');
		$kelurahan 	= $this->input->post('kelurahan');
		$kecamatan 	= $this->input->post('kecamatan');
		$tem_lahir 	= $this->input->post('tempat_lahir');
		$tgl_lahir 	= $this->input->post('tanggal_lahir');
		$pend 		= $this->input->post('pendidikan');
		$kerja 	 	= $this->input->post('pekerjaan');

		$data = array(
			'nik' => $nik,
			'kk' => $kk,
			'no_ak1' => $ak1,
			'nama' => $nama,
			'jenis_kelamin' => $jk,
			'email' => $email,
			'no_telepon' => $telepon,
			'pendidikan_terakhir' => $pend,
			'status_pekerjaan' => 'Belum Bekerja',
			'kode_alamat' => $kode_alm
		);

		$dataAlamat = array(
			'kode_alamat' => $kode_alm,
			'alamat' => $alamat,
			'kelurahan' => $kelurahan,
			'kecamatan' => $kecamatan,
			'tempat_lahir' => $tem_lahir,
			'tanggal_lahir' => $tgl_lahir
		);

		$dataHistory = array(
			'aktivitas' => 'Daftar Pelatihan : '.$pelatihan,
			'detail' => json_encode(array_merge($data, $dataAlamat)),
			'kode_user' => 'Umum'
		);

		$dataPeserta = array(
			'tanggal_daftar' => $date,
			'status' => '0',
			'kode_pelatihan' => $pelatihan,
			'nik' => $nik
		);

		$cek = $this->tools->cek_nik($nik);

		if ($cek > 0) {
			$periode = $this->tools->cek_periode($nik);
			$umur = intval(date('z', time() - strtotime($periode[0]->tanggal_daftar))) - date('z',1970);
			$jangka = 730 - $umur;
			$years_remaining = intval($jangka / 365); 
			$days_remaining = $jangka % 365;          
			if ($umur <= 730) {
				$this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">Gagal Mendaftar! Tersisa '.$years_remaining.' Tahun '.$days_remaining.' Hari Lagi Untuk Mendaftar</div>');
				redirect('Home/pelatihanDetail/'.$pelatihan.'', 'refresh');
			} else {
				$this->db->insert('table_peserta_pelatihan', $dataPeserta);
				$this->db->insert('table_history', $dataHistory);
				$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">Berhasil Dikirim!</div>');
				redirect('Home/pelatihanDetail/'.$pelatihan.'', 'refresh');
			}
		} else {
			$this->db->insert('table_peserta', $data);
			$this->db->insert('table_alamat', $dataAlamat);
			$this->db->insert('table_history', $dataHistory);
			$this->db->insert('table_peserta_pelatihan', $dataPeserta);
			$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">Berhasil Dikirim!</div>');
			redirect('Home/pelatihanDetail/'.$pelatihan.'', 'refresh');
		}		
	}

	public function lpk()
	{
		$path = "";
		$arraydata = array(
		'lpk' => $this
            ->model
            ->dataLPK(12),
        );
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - LPK", $path),
			"content" => $this->load->view('home/lpk', $arraydata, true),
			
		);
		$this->load->view('home/template/default_template', $data);
	}

	public function lpkDetail()
	{
		$id = $this->uri->segment(3);
		$array = array(
			"detail"=> $this->model->dataLPKdetail($id),
			'lpk' => $this
            ->model
            ->dataLPK(6),
		);
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - LPK Detail", $path),
			"content" => $this->load->view('home/lpkDetail', $array, true),

		);
		$this->load->view('home/template/default_template', $data);
	}

	public function info()
	{
		$path = "";
		$arraydata = array(
		'berita' => $this
            ->model
            ->dataBerita(6),
        );
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Informasi", $path),
			"content" => $this->load->view('home/info', $arraydata, true),
		);
		$this->load->view('home/template/default_template', $data);
	}

	public function infoDetail()
	{
		$id = $this->uri->segment(3);
		$array = array(
			"detail"=> $this->model->dataBeritaDetail($id),
			'info' => $this
            ->model
            ->dataBerita(6),
		);
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Informasii Detail", $path),
			"content" => $this->load->view('home/infoDetail', $array, true),
		);
		$this->load->view('home/template/default_template', $data);
	}

	public function notfound()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - 404 Not Found", $path),
			"content" => $this->load->view('404', false, true),
		);
		$this->load->view('404', $data);
	}

	public function tambahHelpDesk()
	{
		$tipe = $this->input->post('tipe');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$status = $this->input->post('status');
		$masukan = $this->input->post('masukan');

		$data = array(
			"tipe" => $tipe,
			"email" => $email,
			"nik" => $nik,
			"nama" => $nama,
			"status" => $status,
			"pesan" => $masukan
		);

		$this->db->insert("table_helpdesk", $data);
		$this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert">Berhasil Dikirim!</div>');
		redirect('', 'refresh');
	}
	
}
