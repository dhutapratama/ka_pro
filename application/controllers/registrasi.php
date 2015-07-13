<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		if($this->session->userdata("admin") == true) {
			$this->session->sess_destroy();
		}
	}
	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('registrasi');
		$this->load->view('footer');
	}

	public function go()
	{
		$this->load->model("m_login");
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[members.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('identitas', 'Nomor Identitas', 'required|numeric');
		$this->form_validation->set_message('is_unique', 'Ups, Username telah digunakan!');
		$this->form_validation->set_message('required', 'Harap mengisi kolom %s !');
		$this->form_validation->set_message('numeric', 'Kolom %s hanya dapat diisi dengan angka!');

		if ($this->form_validation->run() == false) {
			$output["registrasi"] = false;
		} else {
			$status_registrasi = $this->m_login->registrasi();
			$output["registrasi"] = true;

			if ($status_registrasi == false) {
				$output["registrasi"] = false;
			}
		}

		$this->load->view('header');
		$this->load->view('registrasi', $output);
		$this->load->view('footer');
	}
}
