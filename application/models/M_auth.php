<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
	public function register_user($data)
	{
		// penambahan user/admin
		$this->db->insert('tbl_user', $data);
	}

	public function login_user($email, $password)
	{
		// pengecekan untuk melakukan login dengan email
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where(array(
			'email' => $email,
			// 'password' => $password
		));

		return $this->db->get()->row();
	}

	public function login_pelanggan($email, $password)
	{

		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where(array(
			'email' => $email,
			// 'password' => $password
		));

		return $this->db->get()->row();
	}
}

/* End of file ModelName.php */
