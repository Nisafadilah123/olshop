<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

	public function total_barang()
	{
		// perhitungan total barang
		return $this->db->get('produk')->num_rows();
	}

	public function total_kategori()
	{
		return $this->db->get('kategori')->num_rows();
	}

	public function total_user()
	{
		return $this->db->get('tbl_user')->num_rows();
	}

	public function total_pelanggan()
	{
		return $this->db->get('pelanggan')->num_rows();
	}

	public function total_pesanan()
	{
		return $this->db->get('tbl_transaksi')->num_rows();
	}

	public function data_setting()
	{
		// penyetingan data tempat toko
		$this->db->select('*');
		$this->db->from('tbl_setting');
		$this->db->where('id', 1);
		return $this->db->get()->row();
	}

	public function edit($data)
	{
		// pengeditan dari tempat toko
		$this->db->where('id', $data['id']);
		$this->db->update('tbl_setting', $data);
	}
}

/* End of file ModelName.php */
