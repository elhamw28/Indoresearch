<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model('base_model');
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where(
            'users',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $j_berita = $this->db->get('product')->result_array();
        $data['j_product'] = count($j_berita);

        $j_kategori = $this->db->get('kategori')->result_array();
        $data['j_kategori'] = count($j_kategori);

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }
    public function list_product()
    {
        $data['title'] = 'List Product';
        $data['user'] = $this->db->get_where(
            'users',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $sql = "SELECT product.id, product.nama_product, kategori.nama_kategori, product.deskripsi, product.harga
        product.link_shopee, product.link_tokped FROM product JOIN kategori ON product.id_kategori=kategori.id";

        $data['product'] = $this->db->query($sql)->result_array();
        // $data['berita'] = $this->db->get('berita')->result_array();

        // $sql = 'SELECT COUNT(berita.`status_tulisan`) AS jumlah FROM berita WHERE berita.`status_tulisan` =  "Pending"';
        // $data['status'] = $this->db->query($sql)->row_array();

        // $sqla = 'SELECT COUNT(berita.`status_tulisan`) AS jumlaha FROM berita WHERE berita.`status_tulisan` =  "Publish"';
        // $data['statusa'] = $this->db->query($sqla)->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/list_product', $data);
        $this->load->view('template/footer');
    }
    public function hapusproduct($id)
    {
        $this->db->delete('berita', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Kategori berhasil di hapus !
          </div>');
        redirect('admin/list_product/');
    }


    public function kategori()
    {
        $data['title'] = 'Kategori';
        $data['user'] = $this->db->get_where(
            'users',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['kategori'] = $this->db->get('kategori')->result_array();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/kategori', $data);
            $this->load->view('template/footer');
        } else {

            $data = [

                "nama_kategori" => $this->input->post('nama_kategori')

            ];

            $this->db->insert('kategori', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
              Metode Pembayaran Bertambah</div>');
            redirect('admin/kategori');
        }
    }


    public function editkategori()
    {

        $data = [

            "nama_kategori" => $this->input->post('nama_kategori')

        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kategori', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Kategori Diubah</div>');
        redirect('admin/kategori');
    }


    public function hapuskategori($id)
    {

        $this->db->delete('artikel', array('id' => $id));
        $this->db->delete('kategori', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Kategori berhasil di hapus !
          </div>');
        redirect('admin/kategori/');
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Logout Berhasil !
		  </div>');
        redirect('auth');
    }
    public function add_kategori()
    {

        $nama_kategori = $this->input->post('nama_kategori');

        $data = [
            'nama_kategori' => $nama_kategori,
        ];

        $this->base_model->add_kategori($data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Fakultas berhasil ditambahkan !
      </div>');
        redirect('admin/kategori');
    }
    public function post_product()
    {
        $data['title'] = 'Post Product';
        $data['user'] = $this->db->get_where(
            'users',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/post_product', $data);
        $this->load->view('template/footer');
    }


    public function add_post_product()
    {

        $data['user'] = $this->db->get_where(
            'users',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['product'] = $this->db->get('product')->result_array();


        $judul = $this->input->post('judul');
        $isi_konten = $this->input->post('isi_konten');
        // $tipe_tulisan = $this->input->post('tipe_tulisan');
        $kategori = $this->input->post('kategori');
        $status_tulisan = $this->input->post('status_tulisan');
        $nama = $this->input->post('author');

        $gambar = $_FILES['gambar'];

        if ($gambar = '') {
        } else {
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets_admin/img/berita/';
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gambar')) {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Harap isi gambar</div>');
                redirect('admin/list_berita');
            } else {

                $gambar = $this->upload->data('file_name');
            }
        }

        $data = [
            'judul' => $judul,
            'isi_konten' => $isi_konten,
            'tipe_tulisan' => 'Berita',
            'id_kategori' => $kategori,
            'status_tulisan' => $status_tulisan,
            'date_created' => time(),
            'meta_keyword' => 1,
            'meta_deskripsi' => 1,
            'author' => $nama,
            'gambar' => $gambar
        ];

        $this->db->insert('berita', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berita berhasil ditambahkan !
      </div>');
        redirect('admin/list_berita');
    }

    public function ubah_berita($id)
    {
        $data['title'] = 'Ubah Berita';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['ubah_berita'] = $this->db->get_where('berita', ['id' => $id])->row_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['kategori1'] = $this->db->get_where('kategori', ['id', $id])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/ubah_berita', $data);
        $this->load->view('template/footer');
    }

    public function aksi_ubah_berita()
    {
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $isi_konten = $this->input->post('isi_konten');
        $tipe_tulisan = $this->input->post('tipe_tulisan');
        $kategori = $this->input->post('kategori');
        $status_tulisan = $this->input->post('status_tulisan');
        //cek jika ada gambar yang akan diupload
        $gambar = $_FILES['gambar']['name'];

        $data['berita'] = $this->db->get_where('berita', ['id' => $id])->row_array();

        //ika ada gambar yang di upload

        if ($gambar) {
            $config['upload_path']          = './assets_admin/img/berita';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2048;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $old_image = $data['berita']['gambar'];
                if ($old_image != 'default.png') {
                    unlink(FCPATH, './assets_admin/img/berita/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->query("UPDATE berita SET berita.gambar = '$new_image' WHERE berita.id = $id");
            } else {
                die;
            }
        }

        $data = [
            'judul' => $judul,
            'isi_konten' => $isi_konten,
            'tipe_tulisan' => $tipe_tulisan,
            'id_kategori' => $kategori,
            'update_create' => time(),
            'status_tulisan' => $status_tulisan
        ];

        $this->db->where('id', $id);
        $this->db->update('berita', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Berita telah <strong>diubah.</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('admin/list_berita/');
    }



    public function hapus_berita($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('berita');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Berita telah <strong>dihapus.</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect("admin/list_berita/");
    }
}