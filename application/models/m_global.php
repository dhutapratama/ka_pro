<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class M_global extends CI_Model
{
	
	public function __construct() {
		parent::__construct();
		
	}

	public function get_stasiun() {
		return $this->db->select("*")
			->from("stasiun")
			->get()->result();
	}
	
	public function get_stasiun_by_id($id_stasiun = "") {
		$stasiun = $this->db->select("*")
			->from("stasiun")
			->where("id", $id_stasiun)
			->get()->result();

		return $stasiun[0]->nama_stasiun;
	}

	public function cek_rute($id_stasiun_asal, $id_stasiun_tujuan) {
		$rute = $this->db->select("*")
			->from("harga_tiket")
			->where("id_stasiun_asal", $id_stasiun_asal)
			->where("id_stasiun_tujuan", $id_stasiun_tujuan)
			->get();

		if ($rute->num_rows() == 0) {
			return false;
		} else {
			$rute = $rute->result();

			if ($rute[0]->harga != 0) {
				return $rute[0]->harga;
			} else {
				return false;
			}
		}
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

	public function pesan_tiket() {
		$tiket["id_user"]				= $this->session->userdata("id");
		$tiket["nama_penumpang"] 		= $_POST["nama"];
		$tiket["identitas"] 			= $_POST["identitas"];
		$penumpang 						= $this->input->post("penumpang");
		$tiket["email"] 				= $this->input->post("email");
		$tiket["id_stasiun_asal"] 		= $this->input->post("stasiun_asal");
		$tiket["id_stasiun_tujuan"] 	= $this->input->post("stasiun_tujuan");
		$tiket["harga"] 				= $this->cek_rute($tiket["id_stasiun_asal"], $tiket["id_stasiun_tujuan"]);
		$tiket["tanggal_pesan"] 		= date("Y-m-d H:i:s");
		$tiket["session"] 				= time();
		$tiket["lunas"] 				= "false";
		$tiket["tanggal_keberangkatan"] = date("Y-m-d", $this->input->post("tanggal"));

		$tiket["jam_berangkat"] 	= $this->get_berangkat($tiket["id_stasiun_asal"], $tiket["id_stasiun_tujuan"]);
		$tiket["jam_sampai"] 		= $this->get_sampai($tiket["id_stasiun_asal"], $tiket["id_stasiun_tujuan"]);

		$cek_saldo = $this->db->select("*")
			->from("saldo")
			->where("id_user", $tiket["id_user"])
			->get()->result();
		if ($cek_saldo == false && $tiket["id_user"] != "") {
			$cek_saldo[0]->saldo = 0;
		}

		if (!empty($tiket["nama_penumpang"]) && !empty($tiket["identitas"])) {
			if ($tiket["id_user"] != "") {
				if ($cek_saldo[0]->saldo - ($tiket["harga"] * $penumpang) < 0) {
					return false;
				} else {
					$saldo['saldo'] = $cek_saldo[0]->saldo - ($tiket["harga"] * $penumpang);
					$this->db->where("id_user", $tiket["id_user"]);
					$this->db->update("saldo", $saldo);

					$log['debit'] 		= $tiket["harga"];
					$log['kredit'] 		= 0;
					$log['keterangan'] 	= "Pembelian tiket";
					$log['tanggal'] 	= date("Y-m-d H:i:s");

					$this->db->insert("log_saldo", $log);
				}
			}
			
			for ($i=0; $i < $penumpang; $i++) { 
				$tiket["nama_penumpang"] = $_POST["nama"][$i];
				$tiket["identitas"] = $_POST["identitas"][$i];
				$tiket["id_kursi"] = $_POST["kursi"][$i];
				if ($tiket["id_user"] != "") {
					$tiket["lunas"] = "1";
				}
				$this->db->insert("pemesanan", $tiket);

				$kursi["id_kursi"] = $_POST["kursi"][$i];
				$kursi["tanggal_booking"] = $tiket["tanggal_keberangkatan"];
				$this->db->insert("booking_kursi", $kursi);
			}
			return $tiket["session"];
		} else {
			return false;
		}
	}

	public function saldo($id = "") {
		$tiket["id_user"] = $this->session->userdata("id");
		if ($id != "") {
			$tiket["id_user"] = $id;
		}
		$cek_saldo = $this->db->select("*")
			->from("saldo")
			->where("id_user", $tiket["id_user"])
			->get()->result();

		if ($cek_saldo == false) {
			$cek_saldo[0]->saldo = 0;
		}
		
		return $cek_saldo[0]->saldo;
	}
	
	public function get_kursi() {
		return $this->db->select("*")
			->from("kursi")
			->get()->result();
	}

	public function get_kursi_by_id($id_kursi) {
		$kursi = $this->db->select("*")
			->from("kursi")
			->where("id", $id_kursi)
			->get()->result();

		return $kursi[0]->nama_kursi;
	}

	public function get_kursi_booked($booking_date) {
		return $this->db->select("*")
			->from("booking_kursi")
			->where("tanggal_booking", date("Y-m-d", $booking_date))
			->get()->result();
	}

	public function transaksi() {
		return $this->db->select("*")
			->from("log_saldo")
			->where("id_user", $this->session->userdata("id"))
			->get()->result();
	}

	public function get_tiket($id = "")
	{
		return $this->db->select("*, stasiun_asal.nama_stasiun as nama_stasiun_asal, stasiun_tujuan.nama_stasiun as nama_stasiun_tujuan")
			->from("pemesanan")
			->join("stasiun stasiun_asal", "stasiun_asal.id = pemesanan.id_stasiun_asal")
			->join("stasiun stasiun_tujuan", "stasiun_tujuan.id = pemesanan.id_stasiun_tujuan")
			->join("kursi", "kursi.id = pemesanan.id_kursi")
			->where("session", $id)
			->get()->result();
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

	public function update_pemesanan($id, $data) {
		$this->db->where('session', $id);
		$this->db->update('pemesanan', $data);
	}
}