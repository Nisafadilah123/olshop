<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
	public function get_all_data()
	{
		// menampilkan data produk berdasarkan id produk
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');

		$this->db->order_by('id_produk', 'asc');
		return $this->db->get()->result();
	}

	public function get_all_data_kategori()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->order_by('id_kategori', 'asc');
		return $this->db->get()->result();
	}

	// view
	public function detail_produk($id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');


		$this->db->where('id_produk', $id_produk);

		return $this->db->get()->row();
	}

	public function kategori($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('kategori');

		$this->db->where('id_kategori', $id_kategori);

		return $this->db->get()->row();
	}

	public function get_all_data_produk($id_kategori)
	{
		// menampilkan data produk berdasarkan kategori
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->where('produk.id_kategori', $id_kategori);

		$this->db->order_by('id_produk', 'asc');
		return $this->db->get()->result();
	}
}