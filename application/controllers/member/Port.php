<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Port extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_port');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $user_id = $this->session->userdata('id');

        $data = [
            'title' => 'Rule Port Remote',
            'port'   => $this->m_port->get_port($user_id)->result()
        ];

        // var_dump($data);
        // die;
        $this->load->view('member/main', $data);
        $this->load->view('member/port', $data);
    }

    public function addport()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
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
            $this->m_port->insert([
                'user_id' => $user_id,
                'nama' => $this->input->post('nama'),
                'password' => $this->input->post('password'),
                'localaddress' => $this->input->post('localaddress'),
                'remoteaddress' => $this->input->post('remoteaddress'),
                'comment' => $this->input->post('comment')
            ]);
        }

        redirect('member/port');
    }

    public function editport($id)
    {
        $data['port'] = $this->m_port->get_port_by_id($id)->row();
        $this->load->view('edit_port', $data);
    }

    public function updateport()
    {
        $id = $this->input->post('id');
        $data = array(
            'nama' => $this->input->post('nama'),
            'password' => $this->input->post('password'),
            'localaddress' => $this->input->post('localaddress'),
            'remoteaddress' => $this->input->post('remoteaddress'),
            'comment' => $this->input->post('comment')
        );
        $this->m_port->update_port($id, $data);
        redirect('member/port');
    }

    public function delport()
    {
        $id = $this->input->post('id');
        $this->m_port->delete_port($id); 
    }
}
