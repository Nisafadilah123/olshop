<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori extends CI_Model
{
	public function get_all_data()
	{
		// tampil data kategori
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->order_by('id_kategori', 'asc');
		return $this->db->get()->result();
	}

	public function add($data)
	{
		// penambahan data kategori
		$this->db->insert('kategori', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->update('kategori', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->delete('kategori', $data);
	}
}

/* End of file ModelName.php */