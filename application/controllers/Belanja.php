<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('m_home');
		// model yang di gunakan pada contoller ini 

		$this->load->model('m_transaksi');
	}

	// public function coba()
	// {
	// 	$data = $this->cart->contents();
	// 	echo "<pre>";
	// 	print_r($data);
	// }

	public function index()
	{
		// jika kosong maka akan di kembalikan ke controller home
		if (empty($this->cart->contents())) {
			redirect('home');
		}
		$data = array(
			'title' => 'Keranjang Belanja',
			'isi' => 'v_belanja',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function add()
	{
		// proteksi halaman
		$this->pelanggan_login->proteksi_halaman();

		// halaman pengembalian.
		// jika pelanggan telah menambahkan produk ke dalam keranjang amaka akan terjadi pengembalian halaman yang berisi id, qty, price, dan nama
		$redirect_page = $this->input->post('redirect_page');
		$data = array(
			'id'      => $this->input->post('id'),
			'qty'     => $this->input->post('qty'),
			'price'   => $this->input->post('price'),
			'name'    => $this->input->post('name'),

		);

		// jika ada penambahan data produk yang dimasukan ke cart maka akan diarahkan ke library cart dengan method insert
		$this->cart->insert($data);

		// pengembalian jika ke redirect page, maka akan ada pemberharuan
		redirect($redirect_page, 'refresh');
	}

	public function delete($rowid)
	{
		// proteksi halaman
		$this->pelanggan_login->proteksi_halaman();
		// jika ada pengahpusan data produk yang masuk keranjang maka akan diarahkan ke library cart dengan method remove
		$this->cart->remove($rowid);
		redirect('belanja');
	}

	public function clear()
	{
		// jika ingin menghapus semua data pesanan produk yang ada di view cart menggunakan method destroy untuk menghapus session data dari pesanan produk
		$this->cart->destroy();
		// pembalian ke controller belanja
		redirect('belanja');
	}

	public function update()
	{
		// proteksi halaman, jika blm login maka sistem pemesanan tidak akan di lakukan
		$this->pelanggan_login->proteksi_halaman();

		// pemanggilan data pesanan yang masuk kedalam keranjang.

		$i = 1;
		foreach ($this->cart->contents() as $items) {
			$data = array(
				'rowid'   => $items['rowid'],
				'qty'     => $this->input->post($i . '[qty]'),
			);

			// jika terjadi pengupdate/pengubahan dari jumlah produk yang dibeli berdasarkan id dari produk tersebut.
			$this->cart->update($data);
			$i++;
		}
		// pesan masuk jika berhasil ter-update
		$this->session->set_flashdata('pesan', 'Jumlah pesanan berhasil di update');

		redirect('belanja');
	}

	public function chekout()
	{
		//proteksi halaman
		$this->pelanggan_login->proteksi_halaman();

		// form validation yang harus diisi saat proses check out berupa data-data pengirimanya
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('kota', 'Kota', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('ekspedisi', 'Ekspedisi', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('paket', 'Paket', 'required', array(
			'required' => '%s Harus diisi'
		));


		// jika form validation ketika di jalankan bernilai salah maka tidak ada data yang akan tersimpan ke tabel transaksi
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title'   => 'Cek Out Belanja',
				'isi'     => 'v_chekout',
			);
			$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
		} else {
			// jika form validation berhasil 
			$data = array(
				// simpan ke tabel transaksi
				'id_pelanggan' => $this->session->userdata('id_pelanggan'),

				'no_order' => $this->input->post('no_order'),
				'tgl_order' => date('Y-m-d'),
				'nama_penerima' => $this->input->post('nama_penerima'),
				'no_hp' => $this->input->post('no_hp'),
				'provinsi' => $this->input->post('provinsi'),
				'kota' => $this->input->post('kota'),
				'alamat' => $this->input->post('alamat'),
				'kode_pos' => $this->input->post('kode_pos'),
				'ekspedisi' => $this->input->post('ekspedisi'),
				'paket' => $this->input->post('paket'),
				'estimasi' => $this->input->post('estimasi'),
				'ongkir' => $this->input->post('ongkir'),
				'grant_total' => $this->input->post('grant_total'),
				'total_bayar' => $this->input->post('total_bayar'),
				'status_bayar' => '0',
				'status_order' => '0',
			);
			$this->m_transaksi->simpan_transaksi($data);
			// jika pada form validation benar, dan data telah tersimpan, maka otomatis akan tersimpan di tabel rinci transaksi dengan pemanggilan id produk
			// simpan ke tabel rinci transaksi
			$i = 1;
			foreach ($this->cart->contents() as $item) {
				$data_rinci = array(
					'no_order' => $this->input->post('no_order'),
					'id_produk' => $item['id'],
					'qty' => $this->input->post('qty' . $i++),
				);

				$this->m_transaksi->simpan_rinci_transaksi($data_rinci);
			}

			// pesan kalau pesanan berhasil di proses
			$this->session->set_flashdata('pesan', 'Pesanan berhasil di proses');

			// penghapusan session ddari cart
			$this->cart->destroy();

			// pengembalian ke controller pesanan saya
			redirect('pesanan_saya');
		}
	}
}