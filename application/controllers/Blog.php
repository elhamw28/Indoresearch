<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

    public function jenisdata()
    {
        $this->load->view('home/templates/header');
        $this->load->view('blog/jenisdata');
        $this->load->view('home/templates/footer');
    }


    public function marketing()
    {
        $this->load->view('home/templates/header');
        $this->load->view('blog/marketing');
        $this->load->view('home/templates/footer');
    }

    public function research()
    {
        $this->load->view('home/templates/header');
        $this->load->view('blog/research');
        $this->load->view('home/templates/footer');
    }


    public function database()
    {
        $this->load->view('home/templates/header');
        $this->load->view('blog/database');
        $this->load->view('home/templates/footer');
    }

    public function segmentasi()
    {
        $this->load->view('home/templates/header');
        $this->load->view('blog/segmentasi');
        $this->load->view('home/templates/footer');
    }

    public function relationship()
    {
        $this->load->view('home/templates/header');
        $this->load->view('blog/relationship');
        $this->load->view('home/templates/footer');
    }
}