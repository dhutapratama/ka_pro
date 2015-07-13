<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		if($this->session->userdata("admin") == true) {
			$this->session->sess_destroy();
		}
	}
	
	public function index()
	{
		$this->load->model("m_global");

		$output["stasiun"] = $this->m_global->get_stasiun();

		$this->load->view('header');
		$this->load->view('home', $output);
		$this->load->view('footer');
	}

}
