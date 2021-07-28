<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// model yang di gunakan pada contoller ini 

		$this->load->model('m_admin');
		$this->load->model('m_pesanan_masuk');
	}

	public function index()
	{
		// Dashboard controller
		$data = array(
			'title' => 'Dashboard',
			'total_barang' => $this->m_admin->total_barang(),
			'total_kategori' => $this->m_admin->total_kategori(),
			'total_user' => $this->m_admin->total_user(),
			'total_pesanan' => $this->m_admin->total_pesanan(),
			'total_pelanggan' => $this->m_admin->total_pelanggan(),

			'isi' => 'v_admin',
		);
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

	public function setting()
	{
		// controller alamat toko
		$this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('kota', 'Kota', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('alamat', 'Alamat Toko', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('no_hp', 'No Hp', 'required', array(
			'required' => '%s Harus diisi'
		));

		// form validation jika pengisian data ada yang tidak terisi
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Setting',
				'setting' => $this->m_admin->data_setting(),
				'isi' => 'v_setting',
			);
			// kembali ke tampilan view
			$this->load->view('layout/v_wrapper_backend', $data, FALSE);
		} else {
			// form validation jika pengisiann data terisi semua, maka data yang diinputkan akan terkirim ke field dari tabel
			$data = array(
				'id' => 1,
				'lokasi' => $this->input->post('kota'),
				'nama_toko' => $this->input->post('nama_toko'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),

			);

			// data dari lokasi akan dikirim ke model admin dengan function edit
			$this->m_admin->edit($data);
			// pesan settingan berhasil
			$this->session->set_flashdata('pesan', 'Settingan berhasil di ganti');
			// pengembalian dari controller di admin function setting
			redirect('admin/setting');
		}
	}

	public function pesanan_masuk()
	{
		// penyimpanan data pesanan masuk dengan function dari model admin
		$data = array(
			'title' => 'Pesanan Masuk',
			'pesanan' => $this->m_pesanan_masuk->pesanan(),
			'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
			'pesanan_dikirim' => $this->m_pesanan_masuk->pesanan_dikirim(),
			'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),

			'isi' => 'v_pesanan_masuk',
		);
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

	public function verifikasi($id_transaksi)
	{
		// penyimpanan data untuk verifikasi dengan nilai dari status order 1 yang berarti proses berdasarkan id transaksi yang digunakan 
		$data = array(
			'id_transaksi' => $id_transaksi,
			'status_order' => '1',

		);
		// penyimpanan data dengan function update order dari model pesanan masuk
		$this->m_pesanan_masuk->update_order($data);
		// pesan bahwa pesanan di admin telah diproses admin dan notif yang akan muncul adalah pesanan berhasil di proses
		$this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Proses/ Dikemas');
		// pengembalian dari controller di admin function verifikasi
		redirect('admin/pesanan_masuk');
	}

	public function kirim($id_transaksi)
	{
		// penyimpanan data untuk function kirim dengan nilai dari status order 2 yang berarti kirim dan penginputan nilai untuk field no.resi 
		$data = array(
			'id_transaksi' => $id_transaksi,
			'no_resi' => $this->input->post('no_resi'),
			'status_order' => '2',
		);

		// penyimpanan data dengan function update order dari model pesanan masuk
		$this->m_pesanan_masuk->update_order($data);
		// pesan bahwa pesanan telah diproses admin dan notif yang akan muncul adalah pesanan berhasil di kirim
		$this->session->set_flashdata('pesan', 'Pesanan Berhasil Dikirim');
		// pengembalian dari controller di admin function pesanan masuk
		redirect('admin/pesanan_masuk');
	}

	public function delete($id_transaksi)
	{
		// function delete data berdasarkan id transaksi
		$data = array(
			'id_transaksi' => $id_transaksi
		);

		// penyimpanan data dengan function delete dari model pesanan masuk
		$this->m_pesanan_masuk->delete($data);
		// pesan bahwa id pesanan telah dihapus dan notif yang akan muncul adalah pesanan berhasil di proses
		$this->session->set_flashdata('pesan', 'Data berhasil di hapus');
		redirect('admin/pesanan_masuk');
	}
}