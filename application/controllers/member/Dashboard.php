<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('m_topup');
        $this->load->model('m_vpn');
    }

    public function index()
    {
        $user_id = $this->session->userdata('id');
        $totalvpn = $this->m_vpn->get_vpn($user_id)->result();
        $totalrule = $this->m_vpn->get_port($user_id)->result();
        // $totalsaldo = $this->m_topup->count_nominal($user_id);
        $data = [
            'title' => 'Dashboard',
            'totalvpn' => count($totalvpn),
            'totalrule' => count($totalrule),
            // 'totalsaldo' => $totalsaldo
        ];
        $this->load->view('member/main');
        $this->load->view('member/dashboard', $data);
    }

    public function logout()
    {
        //hapus session
        $this->session->sess_destroy();

        redirect('member/login');
    }
}
