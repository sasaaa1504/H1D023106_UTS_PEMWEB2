<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->helper('url');
    }

    // READ: Menampilkan daftar barang
    public function daftar() {
        $data['barang'] = $this->Barang_model->get_all_barang(); // Ambil semua data barang
        $this->load->view('barang/daftar', $data); // Tampilkan ke view
    }

    // CREATE: Form tambah barang
    public function tambah() {
        $data['kategori'] = $this->Barang_model->get_kategori(); // Ambil data kategori
        $this->load->view('barang/tambah', $data); // Tampilkan form tambah
    }

    // CREATE: Simpan barang baru ke database
    public function simpan() {
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'kategori_id' => $this->input->post('kategori_id'),
            'stok' => $this->input->post('stok'),
            'deskripsi' => $this->input->post('deskripsi')
        );

        $this->Barang_model->tambah_barang($data); // Simpan barang
        redirect('barang/daftar'); // Kembali ke daftar
    }

    // UPDATE: Form edit barang
    public function edit($id) {
        $data['barang'] = $this->Barang_model->get_barang_by_id($id); // Ambil barang berdasarkan ID
        $data['kategori'] = $this->Barang_model->get_kategori(); // Ambil semua kategori
        $this->load->view('barang/edit', $data); // Tampilkan form edit
    }

    // UPDATE: Simpan perubahan barang
    public function update($id) {
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'kategori_id' => $this->input->post('kategori_id'),
            'stok' => $this->input->post('stok'),
            'deskripsi' => $this->input->post('deskripsi')
        );

        $this->db->where('barang_id', $id);
        $this->db->update('barang', $data); // Update data
        redirect('barang/daftar');
    }

    // DELETE: Hapus barang
    public function hapus($id) {
        $this->db->where('barang_id', $id);
        $this->db->delete('barang');
        redirect('barang/daftar');
    }
}
