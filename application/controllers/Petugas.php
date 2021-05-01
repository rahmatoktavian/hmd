<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
        //memanggil model
        $this->load->model('petugas_model');
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada petugas model
		//function read berfungsi mengambil/read data dari table petugas di database
		$data_petugas = $this->petugas_model->read();
		
		//mengirim data ke view
		$output = array(
						//data petugas dikirim ke view
						'judul' => 'Daftar Petugas',
						'data_petugas' => $data_petugas,
					);

		//memanggil file view
		$this->load->view('petugas_read', $output);
	}

	public function insert() {
		//mengirim data ke view
		$output = array(
						'judul' => 'Tambah Petugas',
					);

		//memanggil file view
		$this->load->view('petugas_insert', $output);
	}

	public function insert_submit() {

		//menangkap data input dari view
		$nama = $this->input->post('nama');

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'nama' => $nama
					);

		//memanggil function insert pada petugas model
		//function insert berfungsi menyimpan/create data ke table petugas di database
		$this->petugas_model->insert($input);

		//mengembalikan halaman ke function read
		redirect('petugas/read');
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);

		//function read berfungsi mengambil 1 data dari table petugas sesuai id yg dipilih
		$data_petugas_single = $this->petugas_model->read_single($id);
		
		//mengirim data ke view
		$output = array(
						//mengirim data petugas yang dipilih ke view
						'judul' => 'Ubah Petugas',
						'data_petugas_single' => $data_petugas_single,
					);

		//memanggil file view
		$this->load->view('petugas_update', $output);
	}

	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//menangkap data input dari view
		$nama = $this->input->post('nama');

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'nama' => $nama
					);

		//memanggil function update pada petugas model
		//function update berfungsi merubah data ke table petugas di database
		$this->petugas_model->update($input, $id);

		//mengembalikan halaman ke function read
		redirect('petugas/read');
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//memanggil function delete pada petugas model
		$this->petugas_model->delete($id);

		//mengembalikan halaman ke function read
		redirect('petugas/read');
	}
}
