<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panduan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_panduan');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $panduan = $this->m_panduan->get_panduan()->result();
        $data = [
            'title' => 'Master Panduan',
            'panduan' => $panduan
        ];
        $this->load->view('template/main', $data);
        $this->load->view('panduan/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Panduan'
        ];
        $this->load->view('template/main', $data);
        $this->load->view('panduan/add', $data);
    }

    public function addpanduan()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Add Panduan',
                'error' => validation_errors()
            ];
            $this->load->view('template/main', $data);
            $this->load->view('panduan/add', $data);
        } else {
            $this->m_panduan->insert([
                'judul' => $this->input->post('judul'),
                'keterangan' => $this->input->post('keterangan'),
            ]);
            $this->session->set_flashdata('success', 'Panduan berhasil ditambahkan.');
            redirect('panduan/index');
        }
    }

    public function edit($id)
    {
        $data['panduan'] = $this->m_panduan->get_panduan_by_id($id)->row();
        $data['title'] = 'Edit Panduan';
        $this->load->view('template/main', $data);
        $this->load->view('panduan/edit', $data);
    }

    public function updatepanduan()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' => 'Edit Panduan',
                'error' => validation_errors(),
                'panduan' => $this->m_panduan->get_panduan_by_id($id)->row()
            ];
            $this->load->view('template/main', $data);
            $this->load->view('panduan/edit', $data);
        } else {
            $data = array(
                'judul' => $this->input->post('judul'),
                'keterangan' => $this->input->post('keterangan')
            );
            $this->m_panduan->update_panduan($id, $data);
            $this->session->set_flashdata('success', 'Panduan berhasil diupdate.');
            redirect('panduan/index');
        }
    }

    public function detail($id)
    {
        $data['panduan'] = $this->m_panduan->get_panduan_by_id($id)->row();
        $data['title'] = 'Detail Panduan';
        $this->load->view('template/main', $data);
        $this->load->view('panduan/detail', $data);
    }

    public function delpanduan()
    {
        $id = $this->input->post('id');
        $this->m_panduan->delete_panduan($id);
        $this->session->set_flashdata('success', 'Panduan berhasil dihapus.');
        redirect('panduan/index');
    }
}
