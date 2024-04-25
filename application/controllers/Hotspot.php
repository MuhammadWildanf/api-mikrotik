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
		$API = new Mikweb();
		$API->connect('103.169.7.234', 'wildan', '1234');
		$hotspotuser = $API->comm('/ip/hotspot/user/print');
		$hotspotuser = json_encode($hotspotuser);
		$hotspotuser = json_decode($hotspotuser,true);
		$data = [
			'totalhotspotuser' => count($hotspotuser),
			'hotspotuser' => $hotspotuser,
		];
		$this->load->view('template/main');
		$this->load->view('hotspot/user', $data);
	}
}


ini_set('display_errors','off');