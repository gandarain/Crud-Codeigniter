<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_model {

	function show_mahasiswa()
	{
        	return $this->db->get('mahasiswa')->result_array();
	}

	function tambah()
	{
		$data = [
			"nama" => $this->input->post('nama', true),
			"nvp" => $this->input->post('nvp', ture),
			"email" => $this->input->post('email', true),
			"jurusan" => $this->input->post('jurusan', true)
		];

		$this->db->insert('mahasiswa', $data);
	}

	function hapus($params=array())
	{
		$this->db->where('id', $params['id']);
		$this->db->delete('mahasiswa');
	}
}