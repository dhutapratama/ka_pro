<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class M_login extends CI_Model
{
	
	public function __construct() {
		parent::__construct();
		
	}

	public function login($username, $password) {
        //Cek Username & Password
		return $this->db->select("*")
			->from("members")
			->where("username", $username)
            ->where("password", md5($password))
			->get()->result();
	}
    
    public function registrasi() {
        $users["username"]  = $this->input->post("username");
        $users["password"]  = md5($this->input->post("password"));
        $users["nama"]      = $this->input->post("nama");
        $users["identitas"] = $this->input->post("identitas");
        $users["rfid"]      = "false";
        
        $this->db->insert("members", $users);

        $id_user = $this->db->select("*")
			->from("members")
			->where("username", $users["username"])
			->get()->result();

        $saldo["id_user"] = $id_user[0]->id;
        $saldo["saldo"]   = 0;

        $this->db->insert("saldo", $saldo);
	}
}