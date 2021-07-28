<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('m_auth');
	}

	public function login_user($email, $password)
	{
		$cek = $this->ci->m_auth->login_user($email, $password);
		if ($cek && password_verify($password, $cek->password)) {
			$id_user = $cek->id_user;

			$nama_user = $cek->nama_user;
			$username = $cek->username;
			$email = $cek->email;
			$level_user = $cek->level_user;

			// buat session
			$this->ci->session->set_userdata('id_user', $id_user);
			$this->ci->session->set_userdata('nama_user', $nama_user);
			$this->ci->session->set_userdata('username', $username);

			$this->ci->session->set_userdata('email', $email);
			$this->ci->session->set_userdata('level_user', $level_user);


			// redirect ke halaman home
			redirect('admin');
		} else {
			// jika salah
			$this->ci->session->set_flashdata('error', 'Username atau passsword salah');


			redirect('auth/login_user');
		}
	}

	public function proteksi_halaman()
	{
		if ($this->ci->session->userdata('nama_user') == '') {
			$this->ci->session->set_flashdata('error', 'Anda belum login');
			redirect('auth/login_user');
		}
	}

	public function logout_user()
	{
		$this->ci->session->unset_userdata('id_user');

		$this->ci->session->unset_userdata('nama_user');
		$this->ci->session->unset_userdata('username');
		$this->ci->session->unset_userdata('email');
		$this->ci->session->unset_userdata('password');
		$this->ci->session->unset_userdata('level_user');

		$this->ci->session->set_flashdata('pesan', 'Anda berhasil logout');

		redirect('auth/login_user');
	}
}

/* End of file LibraryName.php */