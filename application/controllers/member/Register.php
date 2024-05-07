<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function index()
    {
        $this->load->view('member/register');
    }

    public function simpan()
    {
        $this->load->model('auth_model');

        $data = array(
            'nama' => $this->input->post('nama'),
            'email'       => $this->input->post('email'),
            'password'       => password_hash($this->input->post('password'), PASSWORD_DEFAULT),    
            'notlp'       => $this->input->post('notlp'),
            'alamat'       => $this->input->post('alamat'),

        );

        $register = $this->auth_model->simpan_register($data);

        if($register) {

            echo "success";

        } else {

            echo "error";

        }

    }

}