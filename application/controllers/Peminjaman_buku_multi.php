<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_buku_multi extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
        //memanggil model
        $this->load->model(array('peminjaman_buku_model','peminjaman_model','buku_model'));
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//id peminjaman dari hal peminjaman read
		$peminjaman_id_url = $this->uri->segment(3);

		//untuk data header peminjaman
		$data_peminjaman = $this->peminjaman_model->read_single($peminjaman_id_url);

		//untuk data list buku
		$data_buku = $this->buku_model->read();

		//untuk data list buku yg sudah dipinjam
		$data_peminjaman_buku = $this->peminjaman_buku_model->read($peminjaman_id_url);
		
		$list_peminjaman_buku_id = [];
		foreach($data_peminjaman_buku as $peminjaman_buku) {
			$list_peminjaman_buku_id[$peminjaman_buku['buku_id']] = 1;
		}

		//mengirim data ke view
		$output = array(
						//data peminjaman_buku dikirim ke view
						'judul' => 'Daftar Peminjaman Buku',
						'peminjaman_id_url' => $peminjaman_id_url,
						'data_peminjaman' => $data_peminjaman,
						'data_buku' => $data_buku,
						'list_peminjaman_buku_id' => $list_peminjaman_buku_id,
					);

		//memanggil file view
		$this->load->view('peminjaman_buku_multi_read', $output);
	}

	public function insert_submit() {
		//id peminjaman dari hal peminjaman read
		$peminjaman_id_url = $this->uri->segment(3);

		//menangkap data input dari view
		$list_buku_id = $this->input->post('list_buku_id');

		//hapus buku id di table peminjaman buku berdasarkan peminjaman id url
		$this->peminjaman_buku_model->delete_multi($peminjaman_id_url);

		//insert list buku berdasarkan checkbox yang terpilih dari view
		foreach($list_buku_id as $buku_id=>$value) {
			//mengirim data ke model
			$input = array(
							//format : nama field/kolom table => data input dari view
							'peminjaman_id' => $peminjaman_id_url,
							'buku_id' => $buku_id
						);

			//memanggil function insert pada peminjaman_buku model
			//function insert berfungsi menyimpan/create data ke table peminjaman_buku di database
			$this->peminjaman_buku_model->insert($input);
		}
		
		//mengembalikan halaman ke function read
		redirect('peminjaman_buku_multi/read/'.$peminjaman_id_url);
	}
}
