<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("m_admin");

		if ($this->session->userdata('admin') == false && $this->uri->segment(2) != "") {
			if($this->uri->segment(2) == "login") {

			} else {
				redirect("administrator");
			}
		}
	}

	public function index()
	{
		$this->load->view('administrator/header');
		$this->load->view('administrator/login');
		$this->load->view('administrator/footer');
	}

	public function login()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			$output["login"] = false;
		} else {
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			$status_login = $this->m_admin->login($username, $password);
			$output["login"] = true;

			if ($status_login == false) {
				$output["login"] = false;
			} else {
				$session_data["username"] 	= $status_login[0]->username;
				$session_data["admin"] 		= TRUE;
				$this->session->set_userdata($session_data);
			}
		}

		$this->load->view('administrator/header');
		$this->load->view('administrator/login', $output);
		$this->load->view('administrator/footer');
	}

	public function do_logout() 
	{
		$this->session->sess_destroy();
		$this->load->view('administrator/header');
		$this->load->view('administrator/login');
		$this->load->view('administrator/footer');
	}

	public function tiket($do = "") 
	{
		if ($do == "update_harga") {
			$stasiun_asal 	= $this->input->post("stasiun_asal");
			$stasiun_tujuan = $this->input->post("stasiun_tujuan");
			$harga 			= $this->input->post("harga");
			$nama_kereta 	= $this->input->post("nama_kereta");
			$this->m_admin->set_harga_tiket($stasiun_asal, $stasiun_tujuan, $harga, $nama_kereta);
		}

		if ($do == "add_stasiun") {
			$nama_stasiun 	= $this->input->post("nama_stasiun");
			$this->m_admin->add_stasiun($nama_stasiun);
		}

		if ($do == "hapus_stasiun") {
			$id_stasiun 	= $this->input->post("stasiun");
			$this->m_admin->delete_stasiun($id_stasiun);
		}

		$output['stasiun'] = $this->m_admin->get_stasiun();
		$this->load->view('administrator/header');
		$this->load->view('administrator/harga_tiket', $output);
		$this->load->view('administrator/footer');
	}

	public function isi_saldo($do = "") 
	{
		if($do != "") {
			$user  = $this->input->post("user");
			$saldo = $this->input->post("tambah_saldo");
			$this->m_admin->isi_saldo($user, $saldo);
		}
		$output['users'] = $this->m_admin->get_users();
		$this->load->view('administrator/header');
		$this->load->view('administrator/isi_saldo', $output);
		$this->load->view('administrator/footer');
	}

	public function members($do = "") 
	{
		if($do != "") {
			$this->m_admin->delete_member($do);
		}
		$output['users'] = $this->m_admin->get_users();
		$this->load->view('administrator/header');
		$this->load->view('administrator/members', $output);
		$this->load->view('administrator/footer');
	}

	public function admins($do = "") {
		if ($do == "create") {
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			$this->m_admin->create_admins($username, $password);
		}

		if ($do == "delete") {
			$output['notifikasi'] = $delete = $this->m_admin->delete_admins($this->uri->segment(4));
		}

		$output['admins'] = $this->m_admin->get_admins();
		$this->load->view('administrator/header');
		$this->load->view('administrator/administrators', $output);
		$this->load->view('administrator/footer');
	}

	public function report() 
	{
		$output['tiket'] = $this->m_admin->get_tiket();
		$this->load->view('administrator/header');
		$this->load->view('administrator/report', $output);
		$this->load->view('administrator/footer');
	}

	public function set_kursi() {
		$kursi[0] = "A";
		$kursi[1] = "B";
		$kursi[2] = "C";
		$kursi[3] = "D";
		$kursi[4] = "E";

		for ($i=1; $i < 25; $i++) { 
			for($j = 0; $j <= 4; $j++) {
				$set["nama_kursi"] = $kursi[$j]."-".$i;
				$this->db->insert("kursi", $set);
			}
		}
		echo "Set Nama Kursi SUKSES!";
	}

	public function pending($do = "") 
	{
		if ($do != "") {
			$this->m_admin->lunas($do);
		}

		$output['tiket'] = $this->m_admin->get_tiket_pending();
		$this->load->view('administrator/header');
		$this->load->view('administrator/pending', $output);
		$this->load->view('administrator/footer');
	}

	public function rekening($do = "", $id = 0) 
	{
		switch ($do) {
			case '':
			break;

			case 'create':
				$data['nama_bank']	 = $this->input->post('nama_bank');
				$data['no_rekening'] = $this->input->post('no_rekening');
				$data['atas_nama']	 = $this->input->post('atas_nama');
				$this->m_admin->add_rekening($data);
				break;

			case 'delete':
				$this->m_admin->delete_rekening($id);
				break;
			
			default:
				
			break;
		}

		$output['rekening'] = $this->m_admin->get_rekening();
		$this->load->view('administrator/header');
		$this->load->view('administrator/bank', $output);
		$this->load->view('administrator/footer');
	}
}
