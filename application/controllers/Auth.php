<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		// sistem yg akan di jalankan untuk pertama kali saat mengakses web di halaman admin
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_auth');
	}

	public function register_user()
	{
		// form validation yg harus diisi oleh admin saat pendaftaran
		$this->form_validation->set_rules('nama_user', 'Nama User', 'required', array(
			'required' => '%s Harus diisi',
		));

		$this->form_validation->set_rules('username', 'Username', 'required', array(
			'required' => '%s Harus diisi',
		));

		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_user.email]', array(
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

		// jika form validation sedang di jalankan dan salah, maka tidak akan menyimpan data dari register admin
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Register Admin',
				'isi' => 'v_register_user',
			);
			$this->load->view('v_register_user', $data, FALSE);
		} else {
			// jika berhasil maka sistem akan menyimpan data inputan register dan password yg di gunakan adalah password hash yang berguna agar tidak mudah di encryptsi. 
			$data = array(
				'nama_user' => $this->input->post('nama_user'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			);
			// pengambilan dengan function register user model auth
			$this->m_auth->register_user($data);
			// pesan jika register berhasil
			$this->session->set_flashdata('pesan', 'Akun Pelanggan berhasil di buat');
			//pengembalian jika data telah selesai di edit atau tambahkan maka tampilan akan ditampilkan kembali di controller auth
			redirect('auth/login_user');
		}
	}

	public function login_user()
	{
		// form validasi login admin jika admin melakukan proses login
		$this->form_validation->set_rules('email', 'Email', 'required', array(
			'required' => '%s Harus di isi',
		));
		$this->form_validation->set_rules('password', 'Password', 'required', array(
			'required' => '%s Harus di isi',
		));

		// jika form validation berjalan dan benar maka sistem admin akan mengecek email dan password yg diinputkan admin.
		if ($this->form_validation->run() == true) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->user_login->login_user($email, $password);
		}

		$data = array(
			'title' => 'Login User',
			'isi' => 'v_login_user',
		);
		// dan jika gagal maka sistem login akan memberikan pesan error dan akan tetap di halaman login

		$this->load->view('v_login_user', $data, FALSE);
	}

	public function logout_user()
	{
		// pemberhentian session dari method userdata yg berada di library user login function logout user
		$this->user_login->logout_user();
	}
}