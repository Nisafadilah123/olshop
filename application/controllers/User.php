<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// model yang di gunakan pada contoller ini 
		$this->load->model('m_user');
	}

	// List all your items
	public function index($offset = 0)
	{

		$data = array(
			'title' => 'Admin',
			// pemanggilan data user/admin
			'user' => $this->m_user->get_all_data(),
			'isi' => 'v_user',
		);
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}


	public function add()
	{
		// penambahan data user/admin
		$data = array(
			'nama_user' => $this->input->post('nama_user'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			// 'level_user' => $this->input->post('level_user'),

		);
		$this->m_user->add($data);
		//var_dump($data);
		$this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
		redirect('user');
	}

	public function edit($id_user = NULL)
	{
		// pengubahan data user/admin

		$data = array(
			'id_user' => $id_user,
			'nama_user' => $this->input->post('nama_user'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			// 'level_user' => $this->input->post('level_user'),

		);
		$this->m_user->edit($data);
		$this->session->set_flashdata('pesan', 'Data berhasil di edit');
		redirect('user');
	}

	public function delete($id_user = NULL)
	{
		// penghapusan data user/admin berdasarkan id user

		$data = array(
			'id_user' => $id_user
		);
		$this->m_user->delete($data);
		$this->session->set_flashdata('pesan', 'Data berhasil di hapus');
		redirect('user');
	}
}