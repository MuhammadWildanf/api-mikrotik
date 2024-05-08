<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forwading extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_port');
    }

    public function index()
    {

        $data = [
            'title' => 'Forwading Port',
            'port'   => $this->m_port->get_all_ports()->result()
        ];

        $this->load->view('template/main', $data);
        $this->load->view('forwading/index', $data);
    }

    public function get_vpn_options()
    {
        $user_id = $this->session->userdata('id');
        $vpn_data = $this->m_vpn->get_vpn($user_id)->result();

        // Mengembalikan data VPN dalam format JSON
        echo json_encode($vpn_data);
    }

    public function addport()
    {

        $this->form_validation->set_rules('port_awal', 'Port Awal', 'trim|required');
        $this->form_validation->set_rules('port_to', 'Port Foward Ke', 'trim|required');
        $this->form_validation->set_rules('ip_vpn', 'IP VPN', 'trim|required');
        $this->form_validation->set_rules('ip_remote', 'IP Remote', 'trim|required');
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
                'vpn_id' => $this->input->post('vpn_id'),
                'port_awal' => $this->input->post('port_awal'),
                'port_to' => $this->input->post('port_to'),
                'ip_vpn' => $this->input->post('ip_vpn'),
                'ip_remote' => $this->input->post('ip_remote'),
                'comment' => $this->input->post('comment')
            ]);
        }

        redirect('forwading');
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
            'port_awal' => $this->input->post('port_awal'),
            'port_to' => $this->input->post('port_to'),
            'ip_vpn' => $this->input->post('ip_vpn'),
            'ip_remote' => $this->input->post('ip_remote'),
            'comment' => $this->input->post('comment'),
            'status' => $this->input->post('status')

        );
        $this->m_port->update_port($id, $data);
        redirect('forwading');
    }

    public function delport()
    {
        $id = $this->input->post('id');
        $this->m_port->delete_port($id);
    }
}
