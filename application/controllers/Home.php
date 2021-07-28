<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// model yang di gunakan pada contoller ini 

		$this->load->model('m_home');
	}

	public function index()
	{
		// halaman awal website
		$data = array(
			'title' => 'Home',
			// pemanggilan seluruh data produk
			'produk' => $this->m_home->get_all_data(),
			'isi' => 'v_home_frontend',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function kategori($id_kategori)
	{
		// pemanggilan kategori berdasarkan id kategori
		$kategori = $this->m_home->kategori($id_kategori);
		// pemanggilan data kategori
		$data = array(
			'title' => 'Kategori Produk :' . $kategori->nama_kategori,
			'produk' => $this->m_home->get_all_data_produk($id_kategori),
			'isi' => 'v_kategori_produk',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function detail_produk($id_produk)
	{
		$this->pelanggan_login->proteksi_halaman();

		// pemanggilan data detail produk berdasarkan id produknya
		$data = array(
			'title' => 'Detail Produk',
			'produk' => $this->m_home->detail_produk($id_produk),
			'isi' => 'v_detail_produk',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}
}