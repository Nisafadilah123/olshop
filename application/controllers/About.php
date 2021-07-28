<?php

defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
	public function index()
	{
		$data = array(
			'title' => 'About Us',
			'isi' => 'v_about',
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}
}