<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotspot extends CI_Controller {

	public function index()
	{
		$API = new Mikweb();
		$API->connect('103.169.7.234', 'wildan', '1234');
		$hotspotuser = $API->comm('/ip/hotspot/user/print');
		$hotspotactiv = $API->comm('/ip/hotspot/active/print');
		$resource = $API->comm('/system/resource/print');
		$resource = json_encode($resource);
		$resource = json_decode($resource,true);

		$data = [
			'hotspotuser' => count($hotspotuser),
			'hotspotactiv' => count($hotspotactiv),
			'cpu' => $resource['0']['cpu-load'],
			'uptime' => $resource['0']['uptime'],
		];

		$this->load->view('template/main');
		$this->load->view('hotspot', $data);
	}

	public function user(){
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		// $API->connect('103.169.7.234', 'wildan', '1234');
		$hotspotuser = $API->comm('/ip/hotspot/user/print');
		$server = $API->comm('/ip/hotspot/print');
		$profile = $API->comm('/ip/hotspot/user/profile/print');
		$data = [
			'title' => 'User Mikweb',
			'totalhotspotuser' => count($hotspotuser),
			'hotspotuser' => $hotspotuser,
			'server' => $server,
			'profile' => $profile,
		];
		$this->load->view('template/main', $data);
		$this->load->view('hotspot/user', $data);
	}

	public function addUser(){
		$post = $this->input->post(null,true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		if ($post['timelimit'] == "") {
            $timelimit = "0.0.0.0";
        } else {
            $timelimit = $post['timelimit'];
        }
		$API->comm("/ip/hotspot/user/add", array(
			"name" => $post['user'],
			"password" => $post['password'],
			"server" => $post['server'],
			"profile" => $post['profile'],
			"limit-uptime" => $timelimit,
			"comment" => $post['comment'],
		) );

		redirect('hotspot/user');
	}
}


ini_set('display_errors','off');