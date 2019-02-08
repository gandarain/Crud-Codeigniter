<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_mahasiswa');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mahasiswa'] = $this->m_mahasiswa->show_mahasiswa();
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Mahasiswa';

        $this->form_validation->set_rules('nama', 'Name', 'required');
        $this->form_validation->set_rules('nvp', 'NIM', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/tambah');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->m_mahasiswa->tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('mahasiswa');
        }
        
    }

    public function hapus($id)
    {
        $this->m_mahasiswa->hapus(array('id' => $id));
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mahasiswa');
    }
}