<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saldo extends CI_Controller
{
    public function __construct()
    {

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

    public function addsaldo()
    {

        $this->form_validation->set_rules('nominal', 'Saldo', 'trim|required');

        if ($this->form_validation->run() == false) {

            $error = [
                'error' => validation_errors()
            ];

            $this->session->set_flashdata($error);
        } else {
            $user_id = $this->session->userdata('id');
            $tanggal_sekarang = date('Y-m-d H:i:s');
            $this->m_saldo->insert([
                'user_id' => $user_id,
                'tanggal' => $tanggal_sekarang,
                'nominal' => $this->input->post('nominal'),
                'status' => 'BELUM DIBAYAR',
                'pembayaran' => 'tes',
            ]);
        }

        redirect('member/saldo');
    }

    public function delsaldo()
    {
        $id = $this->input->post('id');
        $this->m_saldo->delete_saldo($id);
    }
}
