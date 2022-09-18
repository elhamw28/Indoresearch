<?php defined('BASEPATH') or exit('No direct script access allowed');

class Base_model extends CI_Model
{
    public function getArtikel($limit, $start)
    {
        return $this->db->where(' status_tulisan =', 'publish')->order_by('id', 'DESC')->get('artikel', $limit, $start)->result_array();
        // return $this->db->order_by('id', 'DESC');

        // $artikel = "SELECT * FROM artikel WHERE status_tulisan = 'publish' ORDER BY id DESC LIMIT $limit , $start";
        // return $this->db->query($artikel)->result_array();
    }

    public function countAllArtikel()
    {
        # code...
        return $this->db->get('artikel')->num_rows();
    }

    public function getBerita($limit, $start)
    {
        return $this->db->where(' status_tulisan =', 'publish')->order_by('id', 'DESC')->get('berita', $limit, $start)->result_array();
    }

    public function countAllBerita()
    {
        # code...
        return $this->db->get('berita')->num_rows();
    }

    public function getPengumuman($limit, $start)
    {
        return $this->db->order_by('id', 'DESC')->get('pengumuman', $limit, $start)->result_array();
    }

    public function countAllPengumuman()
    {
        # code...
        return $this->db->get('pengumuman')->num_rows();
    }

    public function get_jenisPendaftar()
    {
        $query = $this->db->get('jenis_pendaftar');
        return $query->result_array();
    }
    public function add_kategori($data)
    {
        $this->db->insert('kategori', $data);
    }
    public function add_fakultas($data)
    {
        $this->db->insert('fakultas', $data);
    }
    public function tampil_prodi()
    {
        $sql = "SELECT fakultas.nama_fakultas, prodi.nama_prodi, prodi.kode_prodi, prodi.id_fakultas, prodi.id AS id_prodi
                    FROM fakultas, prodi
                    WHERE fakultas.id = prodi.id_fakultas";
        return $this->db->query($sql)->result_array();
    }
    public function add_prodi($data)
    {
        $this->db->insert('prodi', $data);
    }

    public function getBeritaById($id)
    {
        return $this->db->get_where('berita', ['id' => $id])->row_array();
    }

    public function ubahBerita()
    {


        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        // $jk = $this->input->post('jk');
        // $alamat = $this->input->post('alamat');
        // $tl = $this->input->post('tl');
        // $tgl = $this->input->post('tgl');
        // $ayah = $this->input->post('ayah');
        // $ibu = $this->input->post('ibu');
        // $kelas = $this->input->post('kelas');
        // $agama = $this->input->post('agama');
        // $tahun = $this->input->post('tahun');

        // $id_siswa = $this->input->post('id_siswa');
        // $this->db->set('id_siswa', $id_siswa);


        $this->db->set('id', $id);
        $this->db->set('judul', $judul);
        // $this->db->set('jk', $jk);
        // $this->db->set('alamat', $alamat);
        // $this->db->set('tl', $tl);
        // $this->db->set('tgl', $tgl);
        // $this->db->set('ayah', $ayah);
        // $this->db->set('ibu', $ibu);
        // $this->db->set('kelas', $kelas);
        // $this->db->set('agama', $agama);
        // $this->db->set('tahun', $tahun);

        // $absensi=array(

        // 	'nama' => $nama,
        // 	'kelas' => $kelas,
        // 	'nisn' => $nisn,
        // );

        $this->db->where('id', $id);
        $this->db->update('berita');
        // $this->db->update('absensi',$absensi);
    }
}