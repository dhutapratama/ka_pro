<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservasi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("m_global");
		if($this->session->userdata("admin") == true) {
			$this->session->sess_destroy();
		}
	}
	
	public function index()
	{
		$tanggal 			= $this->input->get("tanggal");
		$id_stasiun_asal 	= $this->input->get("stasiun_asal");
		$id_stasiun_tujuan 	= $this->input->get("stasiun_tujuan");
		$penumpang 			= $this->input->get("penumpang");

		if (!empty($tanggal) && !empty($id_stasiun_asal) && !empty($id_stasiun_tujuan)) {
			$output["stasiun"] = $this->m_global->cek_rute($id_stasiun_asal, $id_stasiun_tujuan);
		} else {
			redirect("");
		}

		$output["stasiun"] 			= $this->m_global->get_stasiun();
		$output["tanggal"]	 		= $tanggal;
		$output["stasiun_asal"]	 	= $this->m_global->get_stasiun_by_id($id_stasiun_asal);
		$output["stasiun_tujuan"] 	= $this->m_global->get_stasiun_by_id($id_stasiun_tujuan);
		$output["harga_tiket"] 		= $this->m_global->cek_rute($id_stasiun_asal, $id_stasiun_tujuan);
		$output["nama_kereta"] 		= $this->m_global->get_nama_kereta($id_stasiun_asal, $id_stasiun_tujuan);
		
				$this->load->model("m_admin");
				$output["jam_berangkat"] 	= $this->m_admin->get_berangkat($id_stasiun_asal, $id_stasiun_tujuan);
				$output["jam_sampai"] 		= $this->m_admin->get_sampai($id_stasiun_asal, $id_stasiun_tujuan);
		$output["kursi"]			= $this->m_global->get_kursi();
		$output["kursi_booked"]		= $this->m_global->get_kursi_booked($tanggal);

		if ($this->session->userdata("id") != "") {
			$tagihan = $output["harga_tiket"] * $penumpang;
			if ($this->m_global->saldo() < $tagihan) {
				$output["saldo_tidak_cukup"] = $tagihan;
			}
		}
		$this->load->view('header');
		$this->load->view('reservasi', $output);
		$this->load->view('footer');
	}

	public function pesan() {

		$tanggal 			= $this->input->post("tanggal");
		$id_stasiun_asal 	= $this->input->post("stasiun_asal");
		$id_stasiun_tujuan 	= $this->input->post("stasiun_tujuan");

		$email				= $this->input->post("email");
		$penumpang			= $this->input->post("penumpang");
		$nama 				= $_POST['nama'];
		$identitas 			= $_POST['identitas'];

		$nama_c				= true;
		$identitas_c 		= true;

		foreach ($nama as $rows) {
			if ($rows == "") {
				$nama_c = false;
			}
		}

		foreach ($identitas as $rows) {
			if ($rows == "") {
				$identitas_c = false;
			}
		}

		if (!empty($tanggal) && !empty($id_stasiun_asal) && !empty($id_stasiun_tujuan) && $nama_c && $identitas_c) {
			if (!empty($email) || $this->session->userdata("id") != "") {
				$output["stasiun"] 			= $this->m_global->cek_rute($id_stasiun_asal, $id_stasiun_tujuan);
				$output["status_pemesanan"] = $this->m_global->pesan_tiket();
				$output["stasiun"] 			= $this->m_global->get_stasiun();
				$output["tanggal"]	 		= $tanggal;
				$output["stasiun_asal"]	 	= $this->m_global->get_stasiun_by_id($id_stasiun_asal);
				$output["stasiun_tujuan"] 	= $this->m_global->get_stasiun_by_id($id_stasiun_tujuan);
				$output["harga_tiket"] 		= $this->m_global->cek_rute($id_stasiun_asal, $id_stasiun_tujuan);
				$this->load->model("m_admin");
				$output["jam_berangkat"] 	= $this->m_admin->get_berangkat($id_stasiun_asal, $id_stasiun_tujuan);
				$output["jam_sampai"] 		= $this->m_admin->get_sampai($id_stasiun_asal, $id_stasiun_tujuan);

				$output['rekening']			= $this->m_admin->get_rekening();

				$this->load->view('header');
				$this->load->view('pembayaran', $output);
				$this->load->view('footer');
			} else {
				$red_here = "reservasi?tanggal=".$tanggal."&stasiun_asal=".$id_stasiun_asal."&stasiun_tujuan=".$id_stasiun_tujuan."&penumpang=".$penumpang."&email=error";
				redirect($red_here);
			}
			
		} else {
			redirect("");
		} 

		
	}

	public function cetak_tiket($id = "") {

		$output["tiket"] 			= $this->m_global->get_tiket($id);

		$this->load->library('pdf');
		$this->pdf->load_view('pdf_template', $output);
		$this->pdf->render();
		$this->pdf->stream("reservasi_tiket.pdf");
	}

	public function konfirmasi($id) {
		//$this->load->model("m_admin");
		//$this->m_admin->lunas($id);

		$data['nama_pengirim'] 	    = $this->input->post('nama_pengirim');
		$data['no_rekening']	    = $this->input->post('no_rekening');
		$data['id_rekening_tujuan'] = $this->input->post('rekening_tujuan');
		$data['jumlah_bayar'] 		= $this->input->post('jumlah_pembayaran');

		$this->m_global->update_pemesanan($id, $data);

		redirect('reservasi/berhasil');

		//$this->cetak_tiket($id);
	}

	public function berhasil() {
		$this->load->view('header');
		$this->load->view('berhasil');
		$this->load->view('footer');
	}
}
