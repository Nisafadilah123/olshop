<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_gambar extends CI_Model
{
	public function get_all_data()
	{
		$this->db->select('produk.*,gambar.*,COUNT(gambar.id_produk) as total_gambar');
		$this->db->from('produk');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');

		$this->db->group_by('produk.id_produk');

		$this->db->order_by('produk.id_produk', 'asc');
		return $this->db->get()->result();
	}
}