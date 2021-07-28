<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_account extends CI_Model
{
	// reset pw
	public function getUserInfo($id_pelanggan)
	{
		$q = $this->db->get_where('pelanggan', array('id_pelanggan' => $id_pelanggan), 1);
		if ($this->db->affected_rows() > 0) {
			$row = $q->row();
			return $row;
		} else {
			error_log('no user found getUserInfo(' . $id_pelanggan . ')');
			return false;
		}
	}

	public function getUserInfoByEmail($email)
	{
		$q = $this->db->get_where('pelanggan', array('email' => $email), 1);
		if ($this->db->affected_rows() > 0) {
			$row = $q->row();
			return $row;
		}
	}

	public function insertToken($id_pelanggan)
	{
		$token = substr(sha1(rand()), 0, 30);
		$date = date('Y-m-d');

		$string = array(
			'token' => $token,
			'id_pelanggan' => $id_pelanggan,
			'created' => $date
		);
		$query = $this->db->insert_string('tokens', $string);
		$this->db->query($query);
		return $token . $id_pelanggan;
	}

	public function isTokenValid($token)
	{
		$tkn = substr($token, 0, 30);
		$uid = substr($token, 30);

		$q = $this->db->get_where('tokens', array(
			'tokens.token' => $tkn,
			'tokens.id_pelanggan' => $uid
		), 1);

		if ($this->db->affected_rows() > 0) {
			$row = $q->row();

			$created = $row->created;
			$createdTS = strtotime($created);
			$today = date('Y-m-d');
			$todayTS = strtotime($today);

			if ($createdTS != $todayTS) {
				return false;
			}

			$user_info = $this->getUserInfo($row->user_id);
			return $user_info;
		} else {
			return false;
		}
	}

	public function updatePassword($post)
	{
		$this->db->where('id_pelanggan', $post['id_pelanggan']);
		$this->db->update('pelanggan', array('password' => $post['password']));
		return true;
	}
}
//End: method tambahan untuk reset code
