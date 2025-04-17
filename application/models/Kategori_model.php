<?php
class Kategori_model extends CI_Model {

    public function get_all() {
        return $this->db->get('kategori')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('kategori', ['id' => $id])->row();
    }

    public function insert() {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];
        $this->db->insert('kategori', $data);
    }

    public function update($id) {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];
        $this->db->where('id', $id)->update('kategori', $data);
    }

    public function delete($id) {
        $this->db->delete('kategori', ['id' => $id]);
    }
}
