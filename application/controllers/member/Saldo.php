<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saldo extends CI_Controller
{
    public function __construct() {
        
        parent::__construct();
        $this->load->model('m_saldo');
        $this->load->library('form_validation');

    }

    public function index()
    {
        $user_id = $this->session->userdata('id');
        $totalsaldo = $this->m_saldo->count_nominal($user_id);
        $saldo = $this->m_saldo->get_saldo($user_id)->result();
        $data = [
            'title' => 'Saldo',
            'saldo' => $saldo,
            'totalsaldo' => $totalsaldo
        ];
        $this->load->view('member/main');
        $this->load->view('member/saldo', $data);
    }
}