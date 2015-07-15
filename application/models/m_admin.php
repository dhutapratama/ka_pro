<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class M_admin extends CI_Model
{
	
	public function __construct() {
		parent::__construct();
		
	}

	public function login($username, $password) {
        //Cek Username & Password
		return $this->db->select("*")
			->from("administrator")
			->where("username", $username)
            ->where("pass", md5($password))
			->get()->result();
	}
    
    public function registrasi() {
        $users["username"]  = $this->input->post("username");
        $users["password"]  = md5($this->input->post("password"));
        $users["nama"]      = $this->input->post("nama");
        $users["identitas"] = $this->input->post("identitas");
        $users["rfid"]      = "false";
        
        return $this->db->insert("members", $users);
	}

	public function get_stasiun() {
		return $this->db->select("*")
			->from("stasiun")
			->get()->result();
	}

	public function get_harga_tiket($id_stasiun_asal, $id_stasiun_tujuan) {

		$harga_tiket = $this->db->select("*")
			->from("harga_tiket")
			->where("id_stasiun_asal", $id_stasiun_asal)
			->where("id_stasiun_tujuan", $id_stasiun_tujuan)
			->get();

		if ($harga_tiket->num_rows() == 0) {
			$harga = 0;
		} else {
			$harga_tiket = $harga_tiket->result();
			$harga = $harga_tiket[0]->harga;
		}

		return $harga;
	}

	public function get_nama_kereta($id_stasiun_asal, $id_stasiun_tujuan) {

		$nama_kereta = $this->db->select("*")
			->from("harga_tiket")
			->where("id_stasiun_asal", $id_stasiun_asal)
			->where("id_stasiun_tujuan", $id_stasiun_tujuan)
			->get();

		if ($nama_kereta->num_rows() == 0) {
			$nama = "";
		} else {
			$nama_kereta = $nama_kereta->result();
			$nama = $nama_kereta[0]->nama_kereta;
		}

		return $nama;
	}

	public function get_berangkat($id_stasiun_asal, $id_stasiun_tujuan) {

		$nama_kereta = $this->db->select("*")
			->from("harga_tiket")
			->where("id_stasiun_asal", $id_stasiun_asal)
			->where("id_stasiun_tujuan", $id_stasiun_tujuan)
			->get();

		if ($nama_kereta->num_rows() == 0) {
			$nama = "";
		} else {
			$nama_kereta = $nama_kereta->result();
			$nama = $nama_kereta[0]->jam_berangkat;
		}

		return $nama;
	}

	public function get_sampai($id_stasiun_asal, $id_stasiun_tujuan) {

		$nama_kereta = $this->db->select("*")
			->from("harga_tiket")
			->where("id_stasiun_asal", $id_stasiun_asal)
			->where("id_stasiun_tujuan", $id_stasiun_tujuan)
			->get();

		if ($nama_kereta->num_rows() == 0) {
			$nama = "";
		} else {
			$nama_kereta = $nama_kereta->result();
			$nama = $nama_kereta[0]->jam_sampai;
		}

		return $nama;
	}

	public function set_harga_tiket($id_stasiun_asal, $id_stasiun_tujuan, $harga, $nama_kereta) {
		$harga_tiket = $this->db->select("*")
			->from("harga_tiket")
			->where("id_stasiun_asal", $id_stasiun_asal)
			->where("id_stasiun_tujuan", $id_stasiun_tujuan)
			->get();

		if ($harga_tiket->num_rows() == 0) {
			$data['id_stasiun_asal'] = $id_stasiun_asal;
			$data['id_stasiun_tujuan'] = $id_stasiun_tujuan;
			$data['harga'] = $harga;
			$data['nama_kereta'] = $nama_kereta;
			$data["jam_berangkat"] = $this->input->post("berangkat");
			$data["jam_sampai"] = $this->input->post("sampai");
			return $this->db->insert("harga_tiket", $data);
		} else {
			$data['harga'] = $harga;
			$data["jam_berangkat"] = $this->input->post("berangkat");
			$data["jam_sampai"] = $this->input->post("sampai");
			if ($nama_kereta != "") {
				$data['nama_kereta'] = $nama_kereta;
			}
			$this->db->where("id_stasiun_asal", $id_stasiun_asal);
			$this->db->where("id_stasiun_tujuan", $id_stasiun_tujuan);
			return $this->db->update("harga_tiket", $data);
		}
	}

	public function add_stasiun($nama_stasiun) {
		$data['nama_stasiun'] = $nama_stasiun;
		return $this->db->insert("stasiun", $data);
	}

	public function delete_stasiun($id_stasiun) {
		$this->db->where("id", $id_stasiun);
		$this->db->delete("stasiun");

		$this->db->where("id_stasiun_asal", $id_stasiun);
		$this->db->or_where("id_stasiun_tujuan", $id_stasiun);
		return $this->db->delete("harga_tiket");
	}

	public function get_users() {
		return $this->db->select("*")
			->from("members")
			->join("saldo", "saldo.id_user = members.id")
			->get()->result();
	}

	public function isi_saldo($id_user, $tambah_saldo) {
		$saldo = $this->db->select("*")
			->from("saldo")
			->where("id_user", $id_user)
			->get();
		if ($saldo->num_rows == 0) {
			$create['id_user'] = $id_user;
			$create['saldo'] = 0;
			$this->db->insert("saldo", $create);
		} else {
			$saldo = $saldo->result();
			$store["saldo"] = $saldo[0]->saldo + $tambah_saldo;

			$this->db->where("id_user", $id_user);
			$this->db->update("saldo", $store);

			$log['debit'] = 0;
			$log['kredit'] = $store["saldo"];
			$log['keterangan'] = "Pembelian saldo";
			$log['tanggal'] = date("Y-m-d H:i:s");
			$log['id_user'] = $id_user;

			return $this->db->insert("log_saldo", $log);
		}
	}

	public function delete_member($id_user) {
		$this->db->where("id_user", $id_user);
		$this->db->delete("saldo");

		$this->db->where("id", $id_user);
		return $this->db->delete("members");
	}

	public function get_admins() {
		return $this->db->select("*")
			->from("administrator")
			->get()->result();
	}

	public function create_admins($username, $password) {
		$data["username"] = $username;
		$data["pass"] = md5($password);

		return $this->db->insert("administrator", $data);
	}

	public function delete_admins($id_admin) {
		$admins = $this->db->select("*")
			->from("administrator")
			->get()->num_rows();

		if ($admins > 1) {
			$this->db->where("iduser", $id_admin);
			return $this->db->delete("administrator");
		} else {
			return false;
		}
		
	}

	public function get_tiket() {
		return $this->db->select("*, stasiun_asal.nama_stasiun as nama_stasiun_asal, stasiun_tujuan.nama_stasiun as nama_stasiun_tujuan")
			->from("pemesanan")
			->join("stasiun stasiun_asal", "stasiun_asal.id = pemesanan.id_stasiun_asal")
			->join("stasiun stasiun_tujuan", "stasiun_tujuan.id = pemesanan.id_stasiun_tujuan")
			->group_by("session")
			->where("lunas", "1")
			->get()->result();
	}

	public function get_tiket_pending() {
		return $this->db->select("*, stasiun_asal.nama_stasiun as nama_stasiun_asal, stasiun_tujuan.nama_stasiun as nama_stasiun_tujuan")
			->join("stasiun stasiun_asal", "stasiun_asal.id = pemesanan.id_stasiun_asal")
			->join("stasiun stasiun_tujuan", "stasiun_tujuan.id = pemesanan.id_stasiun_tujuan")
			->where("lunas", "0")
			->from("pemesanan")
			->where("lunas", "0")
			->group_by("session")
			->get()->result();
	}

	public function lunas($id_tiket) {
		$this->load->config('additional');
			$data["lunas"] = "1";
			$this->db->where("session", $id_tiket);
			$this->db->update("pemesanan", $data);

			$get_tiket = $this->db->select("*")
				->from("pemesanan")
				->where("session", $id_tiket)
				->get()->result();
			$email = $get_tiket[0]->email;

			$this->load->library('email');
            $config['protocol']    = 'smtp';
            $config['smtp_host']    = $this->config->item('smtp_host');
            $config['smtp_port']    = $this->config->item('smtp_port');
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = $this->config->item('email_username'); // Alamat Email
            $config['smtp_pass']    = $this->config->item('email_password'); // Password Email
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'text'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not 
            
            $this->email->initialize($config);
            $this->email->from($config['smtp_user'], 'Admin KAI');
            $this->email->to($email);

            $this->email->subject('TIKET ONLINE');
            $this->email->message('TIKET : '.base_url('reservasi/cetak_tiket/'.$id_tiket));

            $this->email->send();
	}

	public function get_tagihan_by_session($session = "") {
		return $this->db->select("*")
			->from("pemesanan")
			->where("session", $session)
			->get()->result();
	}

	public function tiket_hangus($session) {
		$data = $this->db->select("*")
			->from("pemesanan")
			->where("session", $session)
			->get()->result();

			foreach ($data as $key => $value) {
				$this->db->where("id", $value->id);
				$this->db->delete("pemesanan");

				$this->db->where("id", $value->id);
				$this->db->delete("booking_kursi");
			}
	}

	public function get_rekening() {
		$data = $this->db->select('*')
				->from('rekening')
				->get()->result();

		return $data;
	}

	public function get_rekening_by_id($id = 0) {
		$data = $this->db->select('*')
				->from('rekening')
				->where('id', $id)
				->get()->result();

		return $data[0];
	}

	public function add_rekening($data) {
		// $data['nama_bank']
		// $data['no_rekening']
		// $data['atas_nama']
		return $this->db->insert("rekening", $data);
	}

	public function delete_rekening($id = 0) {
		$this->db->where("id", $id);
		return $this->db->delete("rekening");
	}

	
}