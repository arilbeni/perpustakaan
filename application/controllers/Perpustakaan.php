<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Perpustakaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('menu_model');
    }

    public function kategori_buku()
    {
        $data['title'] = 'Kategori Buku';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['perpustakaan'] = $this->db->get('kategori_buku')->result_array();

        $this->form_validation->set_rules('nama_kelas', 'Nama_kelas', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('perpustakaan/kategori_buku', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_kelas' => $this->input->post('nama_kelas')
            ];
            $this->db->insert('kategori_buku', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">new kategori added!</div>');
            redirect('Perpustakaan/kategori_buku');
        }
    }


    public function data_buku()
    {
        $data['title'] = 'Data Buku';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('menu_model', 'menu');

        $data['perpustakaan'] = $this->menu->getperpus();
        $data['kategori'] = $this->db->get('kategori_buku')->result_array();

        $this->form_validation->set_rules('id_kelas', 'Id_kelas', 'required');
        $this->form_validation->set_rules('nama_buku', 'Nama_buku', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('penerbit', 'penerbit', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('perpustakaan/data_buku', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_kelas' => $this->input->post('id_kelas'),
                'nama_buku' => $this->input->post('nama_buku'),
                'penulis' => $this->input->post('penulis'),
                'penerbit' => $this->input->post('penerbit'),
            ];
            $this->db->insert('data_buku', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data buku berhasil di tambahkan</div>');
            redirect('perpustakaan/data_buku');
        }
    }


    public function hapus($id)
    {
        $this->load->model('menu_model');
        $this->menu_model->datahapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            data buku berhasil di hapus</div>');
        redirect('perpustakaan/data_buku');
    }

    public function hapuskategori($id)
    {
        $this->load->model('menu_model');
        $this->menu_model->kategorihapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        kategori buku berhasil di hapus</div>');
        redirect('perpustakaan/kategori_buku');
    }

    public function kategori_edit($id = NULL)
    {
        $data = [
            'id' => $id,
            'nama_kelas' => $this->input->post('nama_kelas')
        ];
        $this->menu_model->kategori_edit($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            edit berhasil.</div>');
        redirect('perpustakaan/kategori_buku');
    }

    public function databuku_edit($id = NULL)
    {
        $data = [
            'id' => $id,
            "id_kelas" => $this->input->post('id_kelas'),
            "nama_buku" => $this->input->post('nama_buku'),
            "penulis" => $this->input->post('penulis'),
            "penerbit" => $this->input->post('penerbit')
        ];

        $this->menu_model->databuku_edit($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            edit berhasil.</div>');
        redirect('perpustakaan/data_buku');
    }
}
