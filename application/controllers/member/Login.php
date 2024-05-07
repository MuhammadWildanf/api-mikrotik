<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		$this->load->view('member/login');
	}

	public function cek_login()
	{
		$this->load->model('auth_model');

		$nama = $this->input->post('nama');
		$password = $this->input->post('password');

		//cek login via model
		$cek = $this->auth_model->cek_login($nama, $password);

		if (!empty($cek)) {

			foreach ($cek as $user) {

				//looping data user
				$session_data = array(
					'id'   => $user->id,
					'nama'  => $user->nama,
				);
				$this->session->set_userdata($session_data);
			}

			echo "success";
		} else {

			echo "error";
		}
	}

	public function logout()
    {
        // Hapus semua data sesi
        $this->session->sess_destroy();

        // Arahkan pengguna kembali ke halaman login
        redirect('member/login');
    }
}
