<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model("m_global");
		if($this->session->userdata("admin") == true) {
			$this->session->sess_destroy();
		}
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function go()
	{
		$this->load->model("m_login");
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			$output["login"] = false;
		} else {
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			$status_login = $this->m_login->login($username, $password);
			$output["login"] = true;

			if ($status_login == false) {
				$output["login"] = false;
			} else {
				$session_data["username"] 	= $status_login[0]->username;
				$session_data["id"] 		= $status_login[0]->id;
				$session_data["nama"] 		= $status_login[0]->nama;
				$session_data["identitas"] 	= $status_login[0]->identitas;
				$this->session->set_userdata($session_data);
			}
		}

		$this->load->view('header');
		$this->load->view('login', $output);
		$this->load->view('footer');
	}

	public function do_logout() 
	{
		$this->session->sess_destroy();
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

}
