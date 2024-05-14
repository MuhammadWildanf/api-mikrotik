<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct() {
        
        parent::__construct();

    }

    public function index()
    {
        //load view form login
        $saldo = 
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