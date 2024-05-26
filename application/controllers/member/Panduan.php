<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panduan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_panduan');
    }

    public function index()
    {
        $panduan = $this->m_panduan->get_panduan()->result();
        $data = [
            'title' => 'Panduan',
            'panduan' => $panduan
        ];
        $this->load->view('member/main');
        $this->load->view('member/panduan', $data);
    }

}
