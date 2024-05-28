<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		// $API->connect('103.169.7.234', 'wildan', '1234');
		$API->connect($ip, $user, $password);
		$ppp = $API->comm('/ppp/secret/print');
		$pppactive = $API->comm('/ppp/active/getall');
		$resource = $API->comm('/system/resource/print');
		$resource = json_encode($resource);
		$resource = json_decode($resource,true);

		$data = [
			'title' => 'Dashboard Mikweb',
			'ppp' => count($ppp),
			'pppactive' => count($pppactive),
			'cpu' => $resource['0']['cpu-load'],
			'uptime' => $resource['0']['uptime'],
		];

		$this->load->view('template/main', $data);
		$this->load->view('dashboard', $data);
	}
}
