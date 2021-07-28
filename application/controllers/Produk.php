<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// model yang di gunakan pada contoller ini 

		$this->load->model('m_produk');
		$this->load->model('m_kategori');
	}

	public function index()
	{

		$data = array(
			'title' => 'Produk',
			// menampilkan seluruh data produk

			'produk' => $this->m_produk->get_all_data(),
			'isi' => 'produk/v_produk',
		);
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

	public function add()
	{
		// form validation 

		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('id_kategori', 'Nama Kategori', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('harga', 'Harga Produk', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('stok', 'Stok Produk', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('berat', 'Berat Produk', 'required', array(
			'required' => '%s Harus diisi'
		));

		// form validation jika bernilai benar maka akan ada penyimpanan foto produk

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/gambar/'; // tempat penyimpanan foto bukti pembayaran
			$config['allowed_types'] = 'jpeg|jpg|png|ico'; // format yang diijinkan
			$config['max_size']     = '5000'; // ukuran foto maksimal
			// library upload
			$this->upload->initialize($config);
			$field_name = 'gambar'; // nama field

			// jika tidak terupload/gagal upload maka akan ada pesan error 
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Tambah Produk',
					'kategori' => $this->m_kategori->get_all_data(),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'produk/v_add',
				);
				$this->load->view('layout/v_wrapper_backend', $data, FALSE);
			} else {
				// jika berhasil, maka gambar berhasil tersimpan begitu juga dengan form validation

				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);

				$data = array(
					'nama_produk' => $this->input->post('nama_produk'),
					'id_kategori' => $this->input->post('id_kategori'),
					'harga' => $this->input->post('harga'),
					'deskripsi' => $this->input->post('deskripsi'),
					'stok' => $this->input->post('stok'),
					'berat' => $this->input->post('berat'),

					'gambar' => $upload_data['uploads']['file_name'],
				);
				// pemanggilan model produk dengan function add dengan parameter $data yang menyimpan inputan data upload

				$this->m_produk->add($data);
				// pesan jika penambahan data berhasil
				$this->session->set_flashdata('pesan', 'Data berhasil di tambahkan');
				// pengembalian ke controller produk
				redirect('produk');
			}
		}

		$data = array(
			'title' => 'Tambah Produk',
			'kategori' => $this->m_kategori->get_all_data(),
			'isi' => 'produk/v_add',
		);
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

	public function edit($id_produk = NULL)
	{
		// form validation

		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('id_kategori', 'Nama Kategori', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('harga', 'Harga Produk', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('deskripsi', 'Deskripsi Produk', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('stok', 'Stok Produk', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('berat', 'Berat Produk', 'required', array(
			'required' => '%s Harus diisi'
		));

		// form validation jika bernilai benar maka akan ada penyimpanan foto produk
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/gambar/'; // tempat penyimpanan foto bukti pembayaran
			$config['allowed_types'] = 'jpeg|jpg|png|ico'; // format yang diijinkan
			$config['max_size']     = '5000';
			$this->upload->initialize($config);
			$field_name = 'gambar';
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Edit Produk',
					'kategori' => $this->m_kategori->get_all_data(),
					'produk' => $this->m_produk->get_data($id_produk),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'produk/v_edit',
				);
				$this->load->view('layout/v_wrapper_backend', $data, FALSE);
			} else {

				$produk = $this->m_produk->get_data($id_produk);
				// jika gambar produk tidak kosong dan melakukan pergantian foto produk, maka foto produk sebelumnya akan di hapus dan di ganti dengan yang baru 

				if ($produk->gambar !== "") {
					unlink('./assets/gambar/' . $produk->gambar);
				}

				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);


				// inputan data produk

				$data = array(
					'id_produk' => $id_produk,
					'nama_produk' => $this->input->post('nama_produk'),
					'id_kategori' => $this->input->post('id_kategori'),
					'harga' => $this->input->post('harga'),
					'deskripsi' => $this->input->post('deskripsi'),
					'stok' => $this->input->post('stok'),
					'berat' => $this->input->post('berat'),

					'gambar' => $upload_data['uploads']['file_name'],
				);
				// pemangglan model produk dengan function edit dengan parameter $data yang menyimpan data produk
				$this->m_produk->edit($data);
				// pesan jika pengubahan data berhasil
				$this->session->set_flashdata('pesan', 'Data berhasil di edit');
				// pengembalian ke controller produk
				redirect('produk');
			}
			// jika tanpa ganti gambar
			$data = array(
				'id_produk' => $id_produk,
				'nama_produk' => $this->input->post('nama_produk'),
				'id_kategori' => $this->input->post('id_kategori'),
				'harga' => $this->input->post('harga'),
				'deskripsi' => $this->input->post('deskripsi'),
				'stok' => $this->input->post('stok'),
				'berat' => $this->input->post('berat'),


			);
			$this->m_produk->edit($data);
			$this->session->set_flashdata('pesan', 'Data berhasil di edit');
			redirect('produk');
		}

		$data = array(
			'title' => 'Edit Produk',
			'kategori' => $this->m_kategori->get_all_data(),
			'produk' => $this->m_produk->get_data($id_produk),
			'isi' => 'produk/v_edit',
		);
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

	//Delete one item
	public function delete($id_produk = NULL)
	{
		//hapus gambar berdasarkan id produk
		$produk = $this->m_produk->get_data($id_produk);
		if ($produk->gambar !== "") {
			unlink('./assets/gambar/' . $produk->gambar);
		}
		// end hapus gambar
		$data = array(
			'id_produk' => $id_produk
		);
		// pemanggilan model produk dengan function delete dengan parameter $data yang menyimpan data produk setelah melakukan hapus data 
		$this->m_produk->delete($data);
		$this->session->set_flashdata('pesan', 'Data berhasil di hapus');
		redirect('produk');
	}
}