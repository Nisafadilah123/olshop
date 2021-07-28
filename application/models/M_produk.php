<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_produk extends CI_Model
{
	public function get_all_data()
	{
		// tampilkan data produk
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');

		$this->db->order_by('id_produk', 'asc');
		return $this->db->get()->result();
	}

	public function get_data($id_produk)
	{
		// mengambil data nama kategori berdasarkan id kategori di tabel produk
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_produk', 'left');

		$this->db->where('id_produk', $id_produk);

		return $this->db->get()->row();
	}

	public function add($data)
	{
		// penambahan data produk
		$this->db->insert('produk', $data);
	}



	public function edit($data)
	{
		// pengubahan data produk
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->update('produk', $data);
	}

	public function delete($data)
	{
		// penghapusan data produk
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->delete('produk', $data);
	}
}

/* End of file ModelName.php */
