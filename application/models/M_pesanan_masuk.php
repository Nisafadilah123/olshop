<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pesanan_masuk extends CI_Model
{

	public function pesanan()
	{
		// tampilan data pesanan berdasarkan id transaksi
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->order_by('id_transaksi', 'desc');

		$this->db->where('status_order = 0');

		return $this->db->get()->result();
	}

	public function pesanan_diproses()
	{
		// tampilan data pesanan di proses berdasarkan id transaksi
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->order_by('id_transaksi', 'desc');

		$this->db->where('status_order = 1');

		return $this->db->get()->result();
	}

	public function pesanan_dikirim()
	{
		// tampilan data pesanan di kirim berdasarkan id transaksi

		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->order_by('id_transaksi', 'desc');

		$this->db->where('status_order = 2');

		return $this->db->get()->result();
	}

	public function pesanan_selesai()
	{
		// tampilan data pesanan selesai berdasarkan id transaksi
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->order_by('id_transaksi', 'desc');

		$this->db->where('status_order = 3');

		return $this->db->get()->result();
	}


	public function update_order($data)
	{
		// penyimpanan jumlah yang telah di ubah berdasarkan $data dari controller dengan berdasarkan id transaksi
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->update('tbl_transaksi', $data);
	}

	public function delete($data)
	{
		// penghapusan riwayat pesanan yang ada telah di terima
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->delete('tbl_transaksi', $data);
	}
}

/* End of file ModelName.php */