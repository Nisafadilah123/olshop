<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// model yang di gunakan pada contoller ini 

		$this->load->model('m_pelanggan');
		$this->load->model('m_auth');
	}

	public function register()
	{
		// form validation register
		$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required', array(
			'required' => '%s Harus diisi',
		));

		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[pelanggan.email]', array(
			'required' => '%s Harus diisi',
			'is_unique' => '%s Email sudah terdaftar, gunakan email lain'

		));

		$this->form_validation->set_rules('password', 'password', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'required|matches[password]', array(
			'required' => '%s Harus diisi',
			'matches' => '%s Password Tidak Sama'
		));

		// jika form validation bernilai salah / ada yang tdiak diisi, maka data register tidak akan di input/ di simpan dan akan kembali ke halaman semula
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Register Pelanggan',
				'isi' => 'v_register',
			);
			$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
		} else {
			// jika berhasil maka akan menginputkan data dari register
			$data = array(
				'nama_pelanggan' => $this->input->post('nama_pelanggan'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)

			);

			// pemanggilan model pelanggan dengan function register
			$this->m_pelanggan->register($data);
			// pesan jika akun berhasil di buat
			$this->session->set_flashdata('pesan', 'Akun Pelanggan berhasil di buat');
			// pengembalian ke controller pelanggan
			redirect('pelanggan/login');
		}
	}

	public function login()
	{
		// form validation login
		$this->form_validation->set_rules('email', 'Email', 'required', array(
			'required' => '%s Harus di isi',
		));
		$this->form_validation->set_rules('password', 'Password', 'required', array(
			'required' => '%s Harus di isi',
		));

		// jika form validation bernilai tru maka sistem akan mengecek email dan pw pelanggan
		if ($this->form_validation->run() == true) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			// library pelanggan login dengan method login berdasarkan email dan pw
			$this->pelanggan_login->login($email, $password);
		}


		$data = array(

			'title' => 'Login Pelanggan',
			'isi' => 'v_login_pelanggan',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function logout()
	{
		// penghapusan session dengan method log out di library pelanggan login
		$this->pelanggan_login->logout();
	}


	public function pesanan()
	{
		//proteksi halaman
		$this->pelanggan_login->proteksi_halaman();

		$data = array(
			'title' => 'Pesanan Saya',
			'isi' => 'v_pesanan_saya',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function index($offset = 0)
	{
		// pemanggilan data pelanggan
		$data = array(
			'title' => 'Pelanggan',
			'pelanggan' => $this->m_pelanggan->get_all_data(),
			'isi' => 'v_pelanggan',
		);
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}


	public function delete($id_pelanggan = NULL)
	{
		// penghapusan data pelanggan berdasarkan id pelanggan
		$data = array(
			'id_pelanggan' => $id_pelanggan
		);
		// pemanggilan model pelanggan dengan method delete
		$this->m_pelanggan->delete($data);
		// pesan jika berhasil di apus
		$this->session->set_flashdata('pesan', 'Data berhasil di hapus');
		// pengembalian data pelanggan
		redirect('pelanggan');
	}

	public function diterima($id_transaksi)
	{
		// penyimpanan status order berdasarkan id transaksi
		$data = array(
			'id_transaksi' => $id_transaksi,
			'status_order' => '3', // pesanan di terima
		);
		// pemanggilan model pesanan masuk dengan function update order dengan parameter $data yg telah diisi dengan data array status order
		$this->m_pesanan_masuk->update_order($data);
		// pesan jika konfirmasi pesanan telah diterima
		$this->session->set_flashdata('pesan', 'Pesanan Telah Diterima');
		// pemanggilan ke controller pesanan saya
		redirect('pesanan_saya');
	}

	// public function reset_password_validation()
	// {

	// 	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	// 	if ($this->form_validation->run()) {
	// 		$email = $this->input->post('email');
	// 		$reset_key = random_string('alnum', 50);

	// 		if ($this->m_pelanggan->update_reset_key($email, $reset_key)) {
	// 			var_dump("ada");
	// 		} else {
	// 			var_dump("error");
	// 		}
	// 	} else {
	// 		$data = array(
	// 			'title' => 'Forgot Password Pelanggan',
	// 			'isi' => 'v_forgot',
	// 		);
	// 		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	// 	}
	// }

	// public function email_reset_password_validation()
	// {
	// 	$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
	// 	if ($this->form_validation->run()) {

	// 		$email = $this->input->post('email');
	// 		$reset_key =  random_string('alnum', 50);

	// 		if ($this->m_pelanggan->update_reset_key($email, $reset_key)) {

	// 			$this->load->library('email');
	// 			$config = array();
	// 			$config['charset'] = 'utf-8';
	// 			$config['useragent'] = 'Codeigniter';
	// 			$config['protocol'] = "smtp";
	// 			$config['mailtype'] = "html";
	// 			$config['smtp_host'] = "ssl://smtp.gmail.com"; //pengaturan smtp
	// 			$config['smtp_port'] = "465";
	// 			$config['smtp_timeout'] = "5";
	// 			$config['smtp_user'] = "nisafadilah646@gmail.com"; // isi dengan email kamu
	// 			$config['smtp_pass'] = "Nisafadilah123"; // isi dengan password kamu
	// 			$config['crlf'] = "\r\n";
	// 			$config['newline'] = "\r\n";
	// 			$config['wordwrap'] = TRUE;
	// 			//memanggil library email dan set konfigurasi untuk pengiriman email

	// 			$this->email->initialize($config);
	// 			//konfigurasi pengiriman
	// 			$this->email->from($config['smtp_user']);
	// 			$this->email->to($this->input->post('email'));
	// 			$this->email->subject("Reset your password");

	// 			$message = "<p>Anda melakukan permintaan reset password</p>";
	// 			$message .= "<a href='" . site_url('v_forgot' . $reset_key) . "'>klik reset password</a>";
	// 			$this->email->message($message);

	// 			if ($this->email->send()) {
	// 				echo "silahkan cek email <b>" . $this->input->post('email') . '</b> untuk melakukan reset password';
	// 			} else {
	// 				echo "Berhasil melakukan registrasi, gagal mengirim verifikasi email";
	// 			}

	// 			echo "<br><br><a href='" . site_url("pelanggan_login") . "'>Kembali ke Menu Login</a>";
	// 		} else {
	// 			die("Email yang anda masukan belum terdaftar");
	// 		}
	// 	} else {
	// 		$data = array(
	// 			'title' => 'Forgot Password Pelanggan',
	// 			'isi' => 'v_forgot',
	// 		);
	// 		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	// 	}
	// }
}