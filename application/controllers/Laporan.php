<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// model yang di gunakan pada contoller ini 

		$this->load->model('m_laporan');
	}

	public function index()
	{
		$data = array(
			'title' => 'Laporan Penjualan',
			'isi' => 'laporan/v_laporan',
		);
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

	public function lap_harian()
	{
		// pemanggilan data pada tgl, bulan dan thn
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		// data di lap harian
		$data = array(
			'title' => 'Laporan Penjualan Harian Produk',
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_harian($tanggal, $bulan, $tahun),
			'isi' => 'laporan/v_lap_harian',
		);
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

	public function lap_bulanan()
	{
		// pemanggilan data pada bulan dan thn

		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		// data di lap bulanan

		$data = array(
			'title' => 'Laporan Penjualan Bulanan Produk',
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_bulanan($bulan, $tahun),
			'isi' => 'laporan/v_lap_bulanan',
		);
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

	// public function lap_tahunan()
	// {
	// 	$tahun = $this->input->post('tahun');

	// 	$data = array(
	// 		'title' => 'Laporan Penjualan Tahunan',
	// 		'tahun' => $tahun,
	// 		'laporan' => $this->m_laporan->lap_tahunan($tahun),
	// 		'isi' => 'laporan/v_lap_tahunan',
	// 	);
	// 	$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	// }
}

/* End of file Laporan.php */
