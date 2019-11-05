<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
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
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok", $path),
			"content" => $this->load->view('home/index', false, true),
		);
		$this->load->view('home/template/default_template', $data);
	}

	public function pelatihan()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Pelatihan", $path),
			"content" => $this->load->view('home/pelatihan', false, true),
		);
		$this->load->view('home/template/default_template', $data);
	}

	public function pelatihanDetail()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Pelatihan Detail", $path),
			"content" => $this->load->view('home/pelatihanDetail', false, true),
		);
		$this->load->view('home/template/default_template', $data);
	}

	public function lpk()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - LPK", $path),
			"content" => $this->load->view('home/lpk', false, true),
		);
		$this->load->view('home/template/default_template', $data);
	}

	public function lpkDetail()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - LPK Detail", $path),
			"content" => $this->load->view('home/lpkDetail', false, true),
		);
		$this->load->view('home/template/default_template', $data);
	}

	public function info()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Informasi", $path),
			"content" => $this->load->view('home/info', false, true),
		);
		$this->load->view('home/template/default_template', $data);
	}

	public function infoDetail()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Informasii Detail", $path),
			"content" => $this->load->view('home/infoDetail', false, true),
		);
		$this->load->view('home/template/default_template', $data);
	}

	public function data()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Data", $path),
			"content" => $this->load->view('home/data', false, true),
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
	
}
