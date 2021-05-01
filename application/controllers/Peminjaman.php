<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
        //memanggil model
        $this->load->model('peminjaman_model');
    }

	public function index() {
		//mengarahkan ke function read
		$this->read();
	}

	public function read() {
		//memanggil function read pada peminjaman model
		//function read berfungsi mengambil/read data dari table peminjaman di database
		$data_peminjaman = $this->peminjaman_model->read();
		
		//mengirim data ke view
		$output = array(
						//data peminjaman dikirim ke view
						'judul' => 'Daftar Peminjaman',
						'data_peminjaman' => $data_peminjaman,
					);

		//memanggil file view
		$this->load->view('peminjaman_read', $output);
	}

}
