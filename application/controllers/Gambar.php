<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gambar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_gambar');
	}


	public function index()
	{
		$data = array(
			'title' => 'Data Gambar',
			'gambar' => $this->m_gambar->get_all_data(),
			'isi' => 'gambar/v_gambar',
		);
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}
}

/* End of file Controllername.php */
