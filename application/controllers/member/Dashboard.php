<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct() {
        
        parent::__construct();

        //cek session login
        if($this->session->userdata("id") == "") {
            redirect('member/login');
        }

    }

    public function index()
    {
        //load view form login
        $this->load->view('member/main');
        $this->load->view('member/dashboard');
    }

    public function logout()
    {
        //hapus session
        $this->session->sess_destroy();

        redirect('member/login');
    }
}