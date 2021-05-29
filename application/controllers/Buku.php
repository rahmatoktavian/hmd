<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct() {
        parent::__construct();

        //memanggil model
        $this->load->model(array('buku_model','kategori_buku_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada buku model
		//function read berfungsi mengambil/read data dari table buku di database
		$data_buku = $this->buku_model->read();
		
		//mengirim data ke view
		$output = array(
						//data buku dikirim ke view
						'judul' => 'Daftar Buku',
						'data_buku' => $data_buku
					);

		//memanggil file view
		$this->load->view('buku_read', $output);
	}

	public function read_theme() {
		//memanggil function read pada buku model
		//function read berfungsi mengambil/read data dari table buku di database
		$data_buku = $this->buku_model->read();
		
		//mengirim data ke view
		$output = array(
						//data buku dikirim ke view
						'judul' => 'Daftar Buku',
						'data_buku' => $data_buku,
						'theme_page' => 'buku_read_theme'
					);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert() {

		//data kategori untuk dropdown
		$data_kategori = $this->kategori_buku_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Tambah Buku',
						'data_kategori' => $data_kategori
					);

		//memanggil file view
		$this->load->view('buku_insert', $output);
	}

	public function insert_submit() {
		//menangkap data input dari view
		$kategori_id = $this->input->post('kategori_id');
		$judul = $this->input->post('judul');
		$stok = $this->input->post('stok');

		//mengirim data ke model
		$input = array(
						//format : judul field/kolom table => data input dari view
						'kategori_id' => $kategori_id,
						'judul' => $judul,
						'stok' => $stok,
					);
		
		//memanggil function insert pada buku model
		//function insert berfungsi menyimpan/create data ke table buku di database
		$this->buku_model->insert($input);

		//mengembalikan halaman ke function read
		redirect('buku/read');
	}

	public function update() {
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);

		//data kategori untuk dropdown
		$data_kategori = $this->kategori_buku_model->read();

		//function read berfungsi mengambil 1 data dari table buku sesuai id yg dipilih
		$data_buku_single = $this->buku_model->read_single($id);
		
		//mengirim data ke view
		$output = array(
						'judul' => 'Ubah Buku',
						'data_buku_single' => $data_buku_single,
						'data_kategori' => $data_kategori
					);

		//memanggil file view
		$this->load->view('buku_update', $output);
	}

	public function update_submit() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

    	//menangkap data input dari view
		$kategori_id = $this->input->post('kategori_id');
		$judul = $this->input->post('judul');
		$stok = $this->input->post('stok');

		//mengirim data ke model
		$input = array(
						//format : judul field/kolom table => data input dari view
						'kategori_id' => $kategori_id,
						'judul' => $judul,
						'stok' => $stok,
					);

		//memanggil function update pada buku model
		//function update berfungsi merubah data ke table buku di database
		$this->buku_model->update($input, $id);

		//mengembalikan halaman ke function read
		redirect('buku/read');
	}

	public function delete() {
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//memanggil function delete pada buku model
		$this->buku_model->delete($id);

		//mengembalikan halaman ke function read
		redirect('buku/read');
	}
}
