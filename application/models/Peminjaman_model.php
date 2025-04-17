<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

    public function getAll() {
        $this->db->select('peminjaman.id, peminjaman.nama_peminjam, peminjaman.id_barang, peminjaman.jumlah, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali, peminjaman.status, barang.nama_barang');
        $this->db->from('peminjaman');
        $this->db->join('barang', 'barang.id_barang = peminjaman.id_barang');
        return $this->db->get()->result();
    }
    

    public function insert($data) {
        // Menambahkan data ke tabel peminjaman
        $this->db->insert('peminjaman', $data);
    }

    public function get_by_id($id) {
        // Mengambil data peminjaman berdasarkan ID
        return $this->db->get_where('peminjaman', ['id' => $id])->row();
    }
    

    public function update_status($id, $status) {
        // Memperbarui status peminjaman berdasarkan ID
        $this->db->where('id', $id)->update('peminjaman', ['status' => $status]);
    }
}
