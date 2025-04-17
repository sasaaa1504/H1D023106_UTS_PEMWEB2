<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

    // Ambil semua barang yang tersedia
    public function get_barang_tersedia() {
        // Hanya ambil barang yang memiliki stok lebih dari 0
        $this->db->where('stok >', 0);
        return $this->db->get('barang')->result();
    }

    // Ambil data barang berdasarkan ID
    public function get_barang_by_id($id_barang) {
        return $this->db->get_where('barang', ['id_barang' => $id_barang])->row();
    }

    // Ambil data barang berdasarkan nama
    public function get_barang_by_name($nama_barang) {
        return $this->db->get_where('barang', ['nama_barang' => $nama_barang])->row();
    }

    // Kurangi stok barang setelah peminjaman
    public function kurangi_stok($id_barang, $jumlah) {
        // Periksa apakah barang ada di database
        $barang = $this->get_barang_by_id($id_barang);
        
        if ($barang) {
            // Kurangi stok barang hanya jika stok cukup
            if ($barang->stok >= $jumlah) {
                $this->db->set('stok', 'stok - ' . (int)$jumlah, FALSE);
                $this->db->where('id_barang', $id_barang);
                return $this->db->update('barang');
            }
            return false; // Stok tidak cukup
        }
        return false; // Barang tidak ditemukan
    }

    // Update stok barang ketika dikembalikan
    public function update_stok($id_barang, $jumlah) {
        // Periksa apakah barang ada di database
        $barang = $this->get_barang_by_id($id_barang);
        
        if ($barang) {
            $this->db->set('stok', 'stok + ' . (int)$jumlah, FALSE);
            $this->db->where('id_barang', $id_barang);
            return $this->db->update('barang');
        }
        return false; // Barang tidak ditemukan
    }
}
