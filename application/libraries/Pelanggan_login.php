<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_login
{
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('m_auth');
	}

	public function login($email, $password)
	{
		// sistem cek (email dan pw) untuk model auth
		$cek = $this->ci->m_auth->login_pelanggan($email, $password);

		// di encrypt dulu pw nya
		if ($cek && password_verify($password, $cek->password)) {
			$id_pelanggan = $cek->id_pelanggan;

			$nama_pelanggan = $cek->nama_pelanggan;
			$email = $cek->email;
			$foto = $cek->foto;

			// buat session login dengan mengeset data inputan user
			$this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);

			$this->ci->session->set_userdata('nama_pelanggan', $nama_pelanggan);
			$this->ci->session->set_userdata('email', $email);
			$this->ci->session->set_userdata('foto', $foto);


			// redirect ke halaman home
			redirect('home');
		} else {
			// jika salah
			$this->ci->session->set_flashdata('error', 'Username atau passsword salah');


			redirect('pelanggan/login');
		}
	}

	public function proteksi_halaman()
	{
		// proteksi halaman jika belum login maka fitur terkait tidak akan bisa di gunakan
		if ($this->ci->session->userdata('nama_pelanggan') == '') {
			$this->ci->session->set_flashdata('error', 'Anda belum login');
			redirect('pelanggan/login');
		}
	}

	public function logout()
	{
		// penghapusan session dari userdata
		$this->ci->session->unset_userdata('id_pelanggan');

		$this->ci->session->unset_userdata('nama_pelanggan');
		$this->ci->session->unset_userdata('email');
		$this->ci->session->unset_userdata('password');

		$this->ci->session->set_flashdata('pesan', 'Anda berhasil logout');

		redirect('pelanggan/login');
	}
}

/* End of file LibraryName.php */
