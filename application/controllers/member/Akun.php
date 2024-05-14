<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    public function __construct() {
        
        parent::__construct();


    }

    public function index()
    {
        $id = $this->session->userdata('id');
        $data['user'] = $this->db->get_where('users', array('id' => $id))->row();
        $this->load->view('member/main');
        $this->load->view('member/akun', $data);
    }
}