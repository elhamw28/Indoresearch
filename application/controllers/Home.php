<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        // $this->db->limit(3, 'ASC');

        // $data['artikel'] = $this->db->order_by('id', 'DESC');
        // $data['artikel'] = $this->db->limit(3)->get('artikel')->result_array();

        $data['berita'] = $this->db->order_by('id', 'DESC');
        $data['berita'] = $this->db->limit(1)->get('berita')->result_array();

        $data['beritaa'] = $this->db->order_by('id', 'DESC');
        $data['beritaa'] = $this->db->limit(2, 1)->get('berita')->result_array();

        $data['pengumuman'] = $this->db->order_by('id', 'DESC');

        $data['pengumuman'] = $this->db->limit(3)->get('pengumuman')->result_array();

        $artikel = "SELECT * FROM artikel WHERE status_tulisan = 'publish' ORDER BY id DESC 
		LIMIT 3";
        $data['artikel'] = $this->db->query($artikel)->result_array();

        $berita = "SELECT * FROM berita WHERE status_tulisan = 'publish' ORDER BY id DESC 
		LIMIT 1";
        $data['berita'] = $this->db->query($berita)->result_array();

        $beritaa = "SELECT * FROM berita WHERE status_tulisan = 'publish' ORDER BY id DESC 
		LIMIT 1,2";
        $data['beritaa'] = $this->db->query($beritaa)->result_array();

        $this->load->view('home/templates/header');
        $this->load->view('home/index', $data);
        $this->load->view('home/templates/footer');
    }

    public function about()
    {
        $this->load->view('home/templates/header');
        $this->load->view('home/about');
        $this->load->view('home/templates/footer');
    }

    public function services()
    {
        $this->load->view('home/templates/header');
        $this->load->view('home/services');
        $this->load->view('home/templates/footer');
    }

    public function network()
    {
        $this->load->view('home/templates/header');
        $this->load->view('home/network');
        $this->load->view('home/templates/footer');
    }

    public function team()
    {
        $this->load->view('home/templates/header');
        $this->load->view('home/team');
        $this->load->view('home/templates/footer');
    }


    public function client()
    {
        $this->load->view('home/templates/header');
        $this->load->view('home/client');
        $this->load->view('home/templates/footer');
    }

    public function contact()
    {
        $this->load->view('home/templates/header');
        $this->load->view('home/contact');
        $this->load->view('home/templates/footer');
    }
    // public function berita()
    // {
    //     $this->load->view('home/templates/header');
    //     $this->load->view('home/berita');
    //     $this->load->view('home/templates/footer');
    // }

    public function berita()
    {

        // $data['berita'] = $this->db->order_by('id', 'DESC');
        // $data['berita'] = $this->db->get('berita')->result_array();

        // $berita = "SELECT * FROM berita WHERE status_tulisan = 'publish' ORDER BY id DESC ";
        // $data['berita'] = $this->db->query($berita)->result_array();


        $this->load->model('Base_model', 'berita');

        $data['berita'] = $this->db->order_by('id', 'DESC');
        $data['berita'] = $this->db->get('berita')->result_array();


        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost:8080/indoresearch//home/berita/';
        $config['total_rows'] = $this->berita->countAllBerita();

        $config['per_page'] = 4;

        //styling
        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        // $data['artikel'] = $this->db->limit($config['per_page'])->get('artikel')->result_array();

        $data['start'] = $this->uri->segment(3);

        $data['berita'] = $this->berita->getBerita($config['per_page'], $data['start']);

        $this->load->view('home/templates/header');
        $this->load->view('home/berita', $data);
        $this->load->view('home/templates/footer');
    }

    public function detailberita($id)
    {


        $data['berita'] = $this->db->get_where('berita', ['id' => $id])->row_array();

        $data['beritaa'] = $this->db->get_where('berita', ['id' => $id])->row_array();

        $this->load->view('home/templates/header');
        $this->load->view('home/detailberita', $data);
        $this->load->view('home/templates/footer');
    }
}