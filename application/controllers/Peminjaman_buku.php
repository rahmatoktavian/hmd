<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_buku extends CI_Controller {

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
		$data_peminjaman_buku = $this->peminjaman_buku_model->read($peminjaman_id_url);
		
		//mengirim data ke view
		$output = array(
						//data peminjaman_buku dikirim ke view
						'judul' => 'Daftar Peminjaman Buku',
						'peminjaman_id_url' => $peminjaman_id_url,
						'data_peminjaman' => $data_peminjaman,
						'data_peminjaman_buku' => $data_peminjaman_buku,
					);

		//memanggil file view
		$this->load->view('peminjaman_buku_read', $output);
	}

	public function insert() {
		//id peminjaman dari hal peminjaman read
		$peminjaman_id_url = $this->uri->segment(3);

		//daftar buku untuk dropdown
		$data_buku = $this->buku_model->read();

		//mengirim data ke view
		$output = array(
						'judul' => 'Tambah Peminjaman Buku',
						'peminjaman_id_url' => $peminjaman_id_url,
						'data_buku' => $data_buku,
					);

		//memanggil file view
		$this->load->view('peminjaman_buku_insert', $output);
	}

	public function insert_submit() {
		//id peminjaman dari hal peminjaman read
		$peminjaman_id_url = $this->uri->segment(3);

		//menangkap data input dari view
		$buku_id = $this->input->post('buku_id');

		//proses multi query
		$this->db->trans_begin();

		//mengirim data ke model
		$input = array(
						//format : nama field/kolom table => data input dari view
						'peminjaman_id' => $peminjaman_id_url,
						'buku_id' => $buku_id
					);

		//function insert berfungsi menyimpan/create data ke table peminjaman_buku di database
		$this->peminjaman_buku_model->insert($input);

		//ambil stok buku
		$data_buku = $this->buku_model->read_single($buku_id);
		$stok_buku_baru = $data_buku['stok'] - 1;
		
		//kurangi stok buku
		$input_buku = array(
						'stok' => $stok_buku_baru
					);

		$this->buku_model->update($input_buku, $buku_id);

		//batalkan semua query (jika ada error)
		if ($this->db->trans_status() === FALSE) {
		    $this->db->trans_rollback();

		//execute semua query (jika tidak ada error)
		} else {
			$this->db->trans_commit();
		}

		//mengembalikan halaman ke function read
		redirect('peminjaman_buku/read/'.$peminjaman_id_url);
	}

	public function delete() {
		//id peminjaman dari hal peminjaman read
		$peminjaman_id_url = $this->uri->segment(3);

		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(4);

		//proses multi query
		$this->db->trans_begin();

		//ambil data peminjaman
		$data_peminjaman_buku = $this->peminjaman_buku_model->read_single($id);
		$buku_id = $data_peminjaman_buku['buku_id'];

		//memanggil function delete pada peminjaman_buku model
		$this->peminjaman_buku_model->delete($id);

		//ambil stok buku
		$data_buku = $this->buku_model->read_single($buku_id);
		$stok_buku_baru = $data_buku['stok'] + 1;
		
		//kurangi stok buku
		$input_buku = array(
						'stok' => $stok_buku_baru
					);

		$this->buku_model->update($input_buku, $buku_id);

		//batalkan semua query (jika ada error)
		if ($this->db->trans_status() === FALSE) {
		    $this->db->trans_rollback();

		//execute semua query (jika tidak ada error)
		} else {
			$this->db->trans_commit();
		}
		
		//mengembalikan halaman ke function read
		redirect('peminjaman_buku/read/'.$peminjaman_id_url);
	}
}
