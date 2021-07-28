<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{

	public function register($data)
	{
		// penambahan data pelanggan
		$this->db->insert('pelanggan', $data);
	}

	public function get_all_data()
	{
		// penampilan data pelanggan
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->order_by('id_pelanggan', 'asc');
		return $this->db->get()->result();
	}

	public function delete($data)
	{
		// penghapusan data pelanggan
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->delete('pelanggan', $data);
	}

	public function akun_saya($id_pelanggan)
	{
		// penampilan data pelanggan berdasarkan id pelanggan
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('id_pelanggan', $id_pelanggan);

		return $this->db->get()->row();
	}

	// public function saya()
	// {

	// 	$this->db->select('*');
	// 	$this->db->from('pelanggan');
	// 	return $this->db->get()->result();
	// }

	public function edit_profil($data)
	{
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->update('pelanggan', $data);
	}

	// public function add_profil($data)
	// {
	// 	$this->db->insert('pelanggan', $data);
	// }

	// public function update_reset_key($email, $reset_key)
	// {
	// 	$this->db->where('email', $email);
	// 	$data = array('reset_password' => $reset_key);
	// 	$this->db->update('pelanggan', $data);
	// 	if ($this->db->affected_rows() > 0) {
	// 		return TRUE;
	// 	} else {
	// 		return FALSE;
	// 	}
	// }
}