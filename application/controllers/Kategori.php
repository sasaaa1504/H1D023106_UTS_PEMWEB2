<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kategori_model');
    }

    public function index() {
        $data['kategori'] = $this->Kategori_model->get_all();
        $this->load->view('kategori/index', $data);
    }

    public function tambah() {
        $this->load->view('kategori/tambah');
    }

    public function simpan() {
        $this->Kategori_model->insert();
        redirect('kategori');
    }

    public function edit($id) {
        $data['kategori'] = $this->Kategori_model->get_by_id($id);
        $this->load->view('kategori/edit', $data);
    }

    public function update($id) {
        $this->Kategori_model->update($id);
        redirect('kategori');
    }

    public function hapus($id) {
        $this->Kategori_model->delete($id);
        redirect('kategori');
    }
}
