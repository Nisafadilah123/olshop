<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
	public function simpan_transaksi($data)
	{
		// penambahan data transaksi
		$this->db->insert('tbl_transaksi', $data);
	}

	public function simpan_rinci_transaksi($data_rinci)
	{
		// penambahan data rinci transaksi

		$this->db->insert('tbl_rinci_transaksi', $data_rinci);
	}

	public function belum_bayar()
	{
		// menampilkan data transaksi yang belum melakukan pembayaran berdasarkan session id pelanggan dan status order = 0 serta id transaksi 
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where(
			'id_pelanggan',
			$this->session->userdata('id_pelanggan'),
		);
		$this->db->where('status_order=0');


		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}

	public function diproses()
	{
		// menampilkan data transaksi yang sedang melakukan proses berdasarkan session id pelanggan dan status order = 1 serta id transaksi 

		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where(
			'id_pelanggan',
			$this->session->userdata('id_pelanggan'),
		);
		$this->db->where('status_order=1');


		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}

	public function dikirim()
	{
		// menampilkan data transaksi yang sedang dikirim berdasarkan session id pelanggan dan status order = 2 serta id transaksi 

		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where(
			'id_pelanggan',
			$this->session->userdata('id_pelanggan'),
		);
		$this->db->where('status_order=2');


		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}

	public function selesai()
	{
		// menampilkan data transaksi yang telah selesai berdasarkan session id pelanggan dan status order = 3 serta id transaksi 

		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where(
			'id_pelanggan',
			$this->session->userdata('id_pelanggan'),
		);
		$this->db->where('status_order=3');


		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}

	public function detail_pesanan($id_transaksi)
	{
		// menampilkan detail data transaksi berdasarkan id transaksi 

		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where('id_transaksi', $id_transaksi);
		return $this->db->get()->row();
	}

	public function rekening()
	{
		// menampilkan data rekening 

		$this->db->select('*');
		$this->db->from('tbl_rekening');
		return $this->db->get()->result();
	}

	public function upload_buktibayar($data)
	{
		// mengubah data dari $data di controller berdasarkan id transaksi di tabel transaksi 

		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->update('tbl_transaksi', $data);
	}
}