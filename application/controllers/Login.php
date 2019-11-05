<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this
		->load
		->model('M_Tools', 'tools');
		$this
		->load
		->helper('url');
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
		if ($this->session->userdata('username') == true && $this->session->userdata('level') == "Admin") { 
            redirect('Dashboard');
        }elseif($this->session->userdata('email') == true && $this->session->userdata('level') == "User") {
            redirect('DashboardLPK');
        }
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Login", $path),
			"content" => $this->load->view('login', false, true),
		);
		$this->load->view('login', $data);
	}

	public function pendaftaran()
	{
		$path = "";
		$data = array(
			"page" => $this->load("Pelatihan Kota Depok - Pendaftaran", $path),
			"content" => $this->load->view('daftar', false, true),
		);
		$this->load->view('daftar', $data);
	}

        //MENGECEK USERNAME DAN PASSWORD DARI DATABASE
	public function login() {
		$email = $this
		->input
		->post('username');

		$password = md5($this
			->input
			->post('password'));

		$data = $this
		->tools
		->readBy($email, $password);

		if (isset($data->username) && isset($data->password)) {
			if ($email == $data->username && $password == $data->password) {
                    //PENGURUS PUSAT
				if($data->level == "Admin"){
					$newdata = array(
						"username" => $data->username,
						"password" => $data->password,
						"level" => $data->level,
						"kode" => $data->kode_user
					);

					$this
					->session
					->set_userdata($newdata);
					redirect('Dashboard', 'refresh');
                    //PENGURUS
                // }elseif($data->level == "Pengurus" || $data->level == "Pengawas"){
                //     $newdata = array(
                //         "id" => $data->id,
                //         "username" => $data->username,
                //         "password" => $data->password,
                //         "email" => $data->email,
                //         "level" => $data->level,
                //         "kode" => $data->kode_user
                //     );
                //     redirect('pengurus', 'refresh');
                    //USER
				}elseif($data->level == "User"){
					$newdata = array(
						"username" => $data->username,
						"password" => $data->password,
						"level" => $data->level,
						"kode" => $data->kode_user
					);

					$this
					->session
					->set_userdata($newdata);
					redirect('DashboardLPK', 'refresh');
				}
			} else {
				$this->session->set_flashdata('notif', '<script>toastr.error("Akun Belum Terdaftar!", "Error", {"timeOut": "2000","extendedTImeout": "0"});</script>');
				redirect('');
			}
		} else {
			$this->session->set_flashdata('notif', '<script>toastr.error("Your Email Or Password Incorrect!", "Error", {"timeOut": "2000","extendedTImeout": "0"});</script>');
			redirect('');
		}
	}

    //UNTUK LOGOUT DAN MENGHAPUS SESSION LOGIN
	public function logout() {
		$this
		->session
		->sess_destroy();
		redirect('Home', 'refresh');
	}

	// public function gantiPw(){
	// 	$passwordLama = $this->input->post('pwLama');
	// 	$passwordBaru = $this->input->post('pwBaru');
	// 	$lama = $this->session->userdata['password'];
	// 	$id = $this->session->userdata['id'];
	// 	if (md5($passwordLama) == $lama) {
	// 		$data = array("password" => md5($passwordBaru));
	// 		$this->db->where('id', $id);
	// 		$update = $this->db->update('table_login', $data);
	// 		if ($update) {
	// 			echo json_encode('ok');
	// 		}else{
	// 			echo json_encode('fail');
	// 		}
	// 	}else{
	// 		echo json_encode('beda');
	// 	}
	// }
}