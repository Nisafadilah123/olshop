<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// model yang di gunakan pada contoller ini 
		$this->load->model('m_transaksi');
		$this->load->model('m_pesanan_masuk');
	}

	public function index()
	{
		// proteksi halaman untuk login terlebih dahulu
		$this->pelanggan_login->proteksi_halaman();

		// pemanggilan model transaksi dengan function belum bayar, di proses, di kirim, selesai
		$data = array(
			'title' => 'Pesanan Saya',
			'belum_bayar' => $this->m_transaksi->belum_bayar(),
			'diproses' => $this->m_transaksi->diproses(),
			'dikirim' => $this->m_transaksi->dikirim(),
			'selesai' => $this->m_transaksi->selesai(),

			'isi' => 'v_pesanan_saya',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function bayar($id_transaksi)
	{
		// proteksi halaman untuk login terlebih dahulu

		$this->pelanggan_login->proteksi_halaman();

		// form validation 
		$this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required', array(
			'required' => '%s Harus diisi'
		));
		$this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required', array(
			'required' => '%s Harus diisi'
		));
		$this->form_validation->set_rules('no_rek', 'No_Rekening', 'required', array(
			'required' => '%s Harus diisi'
		));

		// form validation jika bernilai benar maka akan ada penyimpanan foto bukti pembayaran
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/bukti_bayar/'; // tempat penyimpanan foto bukti pembayaran
			$config['allowed_types'] = 'jpeg|jpg|png|ico'; // format yang diijinkan
			$config['max_size']     = '5000'; // ukuran foto maksimal
			// library upload
			$this->upload->initialize($config);
			$field_name = 'bukti_bayar'; // nama field

			// jika tidak terupload/gagal upload maka akan ada pesan error 
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Pembayaran',
					'pesanan' => $this->m_transaksi->detail_pesanan(($id_transaksi)),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'v_bayar',
				);
				$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
			} else {
				// jika berhasil, maka gambar berhasil tersimpan begitu juga dengan form validation
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/bukti_bayar/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);

				$data = array(
					'id_transaksi' => $id_transaksi,
					'atas_nama' => $this->input->post('atas_nama'),
					'nama_bank' => $this->input->post('nama_bank'),
					'no_rek' => $this->input->post('no_rek'),
					'status_bayar' => '1', // pesanan diproses

					'bukti_bayar' => $upload_data['uploads']['file_name'],
				);
				// pemanggilan model transaksi dengan function upload bukti pembayaran dengan parameter $data yang menyimpan inputan data upload
				$this->m_transaksi->upload_buktibayar($data);
				// pesan jika bukti pembayaran berhasil di upload
				$this->session->set_flashdata('pesan', 'Bukti Pembayaran Berhasil Di Upload');
				// pengembalian ke controller pesanan saya
				redirect('pesanan_saya');
			}
		}

		// penginputan data jika tanpa memasukkan bukti pembayaran dan hanya form validationnya saja
		$data = array(
			'title' => 'Pembayaran',
			// pemanggilan model transaksi dengan function detail pesanan berdasarkan id transaksi
			'pesanan' => $this->m_transaksi->detail_pesanan(($id_transaksi)),
			// pemanggilan model transaksi dengan function rekening
			'rekening' => $this->m_transaksi->rekening(),
			'isi' => 'v_bayar',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function diterima($id_transaksi)
	{
		// penyimpanan data di terima berdasarkan id transaksi
		$data = array(
			'id_transaksi' => $id_transaksi,
			'status_order' => '3', // di terima
		);
		// pemanggilan model pesanan masuk dengan function update order
		$this->m_pesanan_masuk->update_order($data);
		// pesan jika pesanan telah di terima
		$this->session->set_flashdata('pesan', 'Pesanan Telah Diterima');
		// pengembalian ke controller pesanan saya
		redirect('pesanan_saya');
	}
}