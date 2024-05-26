<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vpn extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_vpn');
        $this->load->model('m_saldo');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $user_id = $this->session->userdata('id');
        $data = [
            'title' => 'VPN Akun',
            'vpn'   => $this->m_vpn->get_vpn($user_id)->result()
        ];

        $this->load->view('member/main', $data);
        $this->load->view('member/vpn', $data);
    }

    public function addvpn()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('user', 'User', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('localaddress', 'Local Address', 'trim|required');
        $this->form_validation->set_rules('remoteaddress', 'Remote Address', 'trim|required');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required');

        if ($this->form_validation->run() == false) {

            $error = [
                'error' => validation_errors()
            ];

            $this->session->set_flashdata($error);
        } else {
            $user_id = $this->session->userdata('id');
            $this->m_vpn->insert([
                'user_id' => $user_id,
                'nama' => $this->input->post('nama'),
                'user' => $this->input->post('user'),
                'password' => $this->input->post('password'),
                'localaddress' => $this->input->post('localaddress'),
                'remoteaddress' => $this->input->post('remoteaddress'),
                'comment' => $this->input->post('comment') , 
                'status' => 'Belum Terdaftar'
            ]);
        }

        redirect('member/vpn');
    }

    public function editvpn($id)
    {
        $data['vpn'] = $this->m_vpn->get_vpn_by_id($id)->row();
        $this->load->view('edit_vpn', $data);
    }

    public function updatevpn()
    {
        $id = $this->input->post('id');
        $data = array(
            'nama' => $this->input->post('nama'),
            'user' => $this->input->post('user'),
            'password' => $this->input->post('password'),
            'localaddress' => $this->input->post('localaddress'),
            'remoteaddress' => $this->input->post('remoteaddress'),
            'comment' => $this->input->post('comment')
        );
        $this->m_vpn->update_vpn($id, $data);
        redirect('member/vpn');
    }

    public function delvpn()
    {
        $id = $this->input->post('id');
        $this->m_vpn->delete_vpn($id);
    }
}
