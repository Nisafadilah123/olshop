<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// model yang di gunakan pada contoller ini 
		$this->load->model('m_kategori');
	}

	public function index()
	{
		// pemanggilan data kategori 
		$data = array(
			'title' => 'Kategori',
			'kategori' => $this->m_kategori->get_all_data(),
			'isi' => 'v_kategori',
		);
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

	public function add()
	{
		// penambahan nama kategori
		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori'),
		);
		// pemanggilan model kategori dengan function add untuk menyimpan data
		$this->m_kategori->add($data);
		// pesan jika data berhasil di tambahkan
		$this->session->set_flashdata('pesan', 'Data berhasil di tambahkan');
		// pengembalian ke controller kategori
		redirect('kategori');
	}

	public function edit($id_kategori = NULL)
	{
		// pengubahan nama kategori berdasarkan id kategori
		$data = array(
			'id_kategori' => $id_kategori,
			'nama_kategori' => $this->input->post('nama_kategori'),
		);
		// pemanggilan model kategori dengan function edit
		$this->m_kategori->edit($data);
		// pesan jika data berhasil di edit

		$this->session->set_flashdata('pesan', 'Data berhasil di edit');
		redirect('kategori');
	}

	public function delete($id_kategori = NULL)
	{
		// hapus data berdasarkan id kategori

		$data = array(
			'id_kategori' => $id_kategori
		);
		// pemanggilan model kategori dengan function delete
		$this->m_kategori->delete($data);
		// pesan jika data kategori berhasil di hapus
		$this->session->set_flashdata('pesan', 'Data berhasil di hapus');
		// pengembalian ke controller kategori

		redirect('kategori');
	}
}