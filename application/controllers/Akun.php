<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// model yang di gunakan pada contoller ini 
		$this->load->model('m_pelanggan');
		//$this->load->model('m_pesanan_masuk');
	}

	public function index()
	{
		// pengambilan session Method userdata digunakan untuk mengambil nilai dari setiap variabel session, dan biasanya diperlukan variabel kunci dari variabel session yang Anda cari sebagai argumen pertama.
		$id_pelanggan = $this->session->userdata('id_pelanggan');

		// proteksi halaman dari library pelanggan login
		$this->pelanggan_login->proteksi_halaman();

		// pengambilan data pelanggan berdasarkan id pelanggan
		$dataPelanggan = $this->m_pelanggan->akun_saya($id_pelanggan);
		$data = array(
			'title' => 'Akun Saya',
			'isi' => 'v_akun_saya',
			'content' => $dataPelanggan,
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	public function update_akun()
	{

		$this->form_validation->set_rules('nama_pelanggan', 'Nama Produk', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('no_hp', 'No. Hp', 'required', array(
			'required' => '%s Harus diisi'
		));

		$this->form_validation->set_rules('email', 'Email', 'required', array(
			'required' => '%s Harus diisi'
		));

		// );
		$id_pelanggan = $this->session->userdata('id_pelanggan');

		// jika form validation bernilai benar atau diisi semua inputan nya termasuk data gambar, maka data gambar akan disimpan
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/pelanggan/';
			$config['allowed_types'] = 'jpeg|jpg|png|ico';
			$config['max_size']     = '5000';

			//library upload
			$this->upload->initialize($config);

			//$this->load->library('upload', $config);
			// <!--untuk memanggil library upload pada CodeIgniter dengan menggunakan pengaturan yang sudah di buat dari variabel $config -->
			$field_name = "foto";
			// jika data akun tak di isi semua maka akan muncul error yg akan muncul di layar
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Edit Profil',
					'content' => $this->m_pelanggan->akun_saya($id_pelanggan),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'v_akun_saya'
				);
				$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
			} else {

				//jika gambar telah diisi, maka gambar tsb akan di timpa oleh gambar yg terbaru
				$pelanggan = $this->m_pelanggan->akun_saya($id_pelanggan);
				if ($pelanggan->foto !== "") {
					unlink('./assets/pelanggan/' . $pelanggan->foto);
				}
				// end hapus gambar
				// jika data masih kosong maka akan ada penguploadan file gambar dengan menginputkan data dari field yg telah diinputkan

				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/pelanggan/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);

				$data = array(
					'id_pelanggan' => $id_pelanggan,
					'nama_pelanggan' => $this->input->post('nama_pelanggan'),
					'alamat' => $this->input->post('alamat'),
					'no_hp' => $this->input->post('no_hp'),
					'email' => $this->input->post('email'),
					'foto' => $upload_data['uploads']['file_name'],
				);

				// pengambilan session dengan set metode user data dengan variabel data yg menampung data array
				$this->session->set_userdata($data);
				//pengambilan function edit profil dari model pelanggan
				$this->m_pelanggan->edit_profil($data);
				// pesan jika akun telah di edit atau di 
				$this->session->set_flashdata('pesan', 'Data berhasil di edit/tambahkan');
				//pengembalian jika data telah selesai di edit atau tambahkan maka tampilan akan ditampilkan kembali di controller akun
				redirect('akun');
			}
			// dan jika pengeditan data profil tanpa mengganti foto atau tidak merubah foto profil, maka data yg akan di kirimkan hanya berupa nama pelanggan, alamat, no. hp, dan email dari akun profil tsb.
			$data = array(
				'id_pelanggan' => $id_pelanggan,
				'nama_pelanggan' => $this->input->post('nama_pelanggan'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),
				'email' => $this->input->post('email'),
			);
			// pengambilan function edit profil jika data yg diinputkan tanpa mengganti gambar
			$this->m_pelanggan->edit_profil($data);
			$this->session->set_flashdata('pesan', 'Data berhasil di edit/ tambahkan');
			redirect('akun');
		}


		$data = array(
			'title' => 'Edit Profile',
			'content' => $this->m_pelanggan->akun_saya($id_pelanggan),
			'isi' => 'v_akun_saya'
		);
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}
}