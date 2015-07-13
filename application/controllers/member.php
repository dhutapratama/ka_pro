<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model("m_global");
		if($this->session->userdata("admin") == true) {
			$this->session->sess_destroy();
		}

		if($this->session->userdata("id") == "") {
			redirect();
		}
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function transaksi()
	{
		$output["transaksi"] = $this->m_global->transaksi();
		$this->load->view('header');
		$this->load->view('transaksi', $output);
		$this->load->view('footer');
	}

}
