<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model di sini, hanya sekali di dalam constructor
        $this->load->model('Model_peminjaman'); // <-- model pertama
        $this->load->model('Peminjaman_model'); // <-- model kedua
        $this->load->model('Barang_model');
        $this->load->library('session');
        $this->load->library('form_validation'); // Untuk validasi form
    }

    // Menampilkan daftar peminjaman
    public function index() {
        // Mengambil semua data peminjaman dan menampilkannya
        $data['peminjaman'] = $this->Model_peminjaman->getAll();
        $this->load->view('peminjaman/index', $data);
    }

    // Menampilkan form tambah peminjaman
    public function create() {
        // Ambil data barang yang tersedia untuk input manual
        $data['barang'] = $this->Barang_model->get_barang_tersedia();
        $this->load->view('peminjaman/create', $data);
    }

    // Proses menyimpan peminjaman
    public function simpan() {
        // Validasi form input
        $this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'required');
        $this->form_validation->set_rules('id_barang', 'ID Barang', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
        $this->form_validation->set_rules('tanggal_pinjam', 'Tanggal Pinjam', 'required');
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kembali', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke form
            $data['barang'] = $this->Barang_model->get_barang_tersedia();
            $this->session->set_flashdata('error', 'Data yang Anda masukkan tidak valid!');
            $this->load->view('peminjaman/create', $data);
        } else {
            // Ambil data dari form
            $id_barang = $this->input->post('id_barang');
            $jumlah = $this->input->post('jumlah');

            // Periksa apakah stok barang cukup
            $barang = $this->Barang_model->get_barang_by_id($id_barang);

            if (!$barang || $barang->stok < $jumlah) {
                // Jika stok tidak mencukupi, tampilkan pesan error
                $this->session->set_flashdata('error', 'Stok barang tidak mencukupi!');
                redirect('peminjaman/create');
            }

            // Siapkan data untuk disimpan ke tabel peminjaman
            $data = [
                'nama_peminjam' => $this->input->post('nama_peminjam'),
                'id_barang' => $id_barang,
                'jumlah' => $jumlah,
                'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
                'tanggal_kembali' => $this->input->post('tanggal_kembali'),
                'status' => 'dipinjam',
            ];

            // Simpan data peminjaman ke tabel peminjaman
            $inserted = $this->Peminjaman_model->insert($data);

            if ($inserted) {
                // Kurangi stok barang setelah peminjaman
                $this->Barang_model->kurangi_stok($id_barang, $jumlah);

                // Set pesan sukses dan redirect ke halaman daftar peminjaman
                $this->session->set_flashdata('success', 'Peminjaman berhasil disimpan.');
                redirect('peminjaman');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan data.');
                redirect('peminjaman/create');
            }
        }
    }

    // Proses pengembalian barang
    public function kembalikan($id, $id_barang, $jumlah) {
        // Ubah status peminjaman menjadi dikembalikan
        $this->Peminjaman_model->update_status($id, 'dikembalikan');

        // Kembalikan stok barang
        $barang = $this->Barang_model->get_barang_by_id($id_barang);
        if ($barang) {
            // Perbarui stok barang
            $this->Barang_model->update_stok($id_barang, $barang->stok + $jumlah);
        }

        // Set pesan sukses dan redirect ke halaman daftar peminjaman
        $this->session->set_flashdata('success', 'Barang berhasil dikembalikan.');
        redirect('peminjaman');
    }

    // Menampilkan laporan berdasarkan filter tanggal
    public function laporan() {
        // Inisialisasi data peminjaman dengan array kosong
        $data['peminjaman'] = [];

        // Jika filter diterapkan
        if ($this->input->post('filter')) {
            // Ambil tanggal awal dan akhir dari form
            $tanggal_awal = $this->input->post('tanggal_awal');
            $tanggal_akhir = $this->input->post('tanggal_akhir');

            // Ambil data peminjaman yang difilter berdasarkan tanggal
            $data['peminjaman'] = $this->Peminjaman_model->get_filtered($tanggal_awal, $tanggal_akhir);
            $data['tanggal_awal'] = $tanggal_awal;
            $data['tanggal_akhir'] = $tanggal_akhir;
        }

        // Tampilkan halaman laporan
        $this->load->view('peminjaman/laporan', $data);
    }
}
