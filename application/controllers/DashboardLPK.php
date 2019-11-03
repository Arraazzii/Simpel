<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardLPK extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_DashboardLPK");
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
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Dashboard", $path),
			"content" => $this->load->view('dashboardLPK/index', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function profil()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - My Profil", $path),
			"content" => $this->load->view('dashboardLPK/profil', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function kegiatan()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Kegiatan Dan Pelatihan", $path),
			"content" => $this->load->view('dashboardLPK/kegiatan', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function peserta()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Peserta", $path),
			"content" => $this->load->view('dashboardLPK/peserta', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function kemitraan()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Kemitraan", $path),
			"content" => $this->load->view('dashboardLPK/kemitraan', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function laporan()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Laporan", $path),
			"content" => $this->load->view('dashboardLPK/laporan', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function kendalasolusi()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Bursa Kerja Khusus Kota Depok - Kendala Dan Solusi", $path),
			"content" => $this->load->view('dashboardLPK/kendalasolusi', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

}
