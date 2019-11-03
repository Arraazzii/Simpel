<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Dashboard");
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
			"page" => $this->load("Pelatihan Kota Depok - Dashboard", $path),
			"content" => $this->load->view('dashboard/index', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
	}

	public function lpkblkln()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - LPK BLKLN", $path),
			"content" => $this->load->view('dashboard/lpkblkln', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
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
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Informasi", $path),
			"content" => $this->load->view('dashboard/info', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
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
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Slider", $path),
			"content" => $this->load->view('dashboard/slider', false, true),
		);
		$this->load->view('dashboard/template/default_template', $data);
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
	
}
