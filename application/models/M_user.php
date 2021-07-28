<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
	public function register_user($data)
	{
		// penambahan data user/admin secara register
		$this->db->insert('tbl_user', $data);
	}

	public function get_all_data()
	{
		// pengambilan data admin/ user yang sudah login
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->order_by('id_user', 'desc');
		return $this->db->get()->result();
	}

	public function add($data)
	{
		// penambahan data user/admin tanp register

		$this->db->insert('tbl_user', $data);
	}

	public function edit($data)
	{
		// pengubahan data user/admin

		$this->db->where('id_user', $data['id_user']);
		$this->db->update('tbl_user', $data);
	}

	public function delete($data)
	{
		// pengapusan data user/admin 

		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('tbl_user', $data);
	}
}

/* End of file ModelName.php */