<?php defined('BASEPATH') OR exit('No direct script access allowed');

function get_peminjaman(){
    $ci =& get_instance();
    $ci->load->model('peminjaman_model');
   
   	$data_peminjaman = $ci->peminjaman_model->read();
   	return $data_peminjaman;
}