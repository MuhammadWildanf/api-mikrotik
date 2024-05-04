<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppp extends CI_Controller
{

    public function secret()
    {
        $ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
        $API = new Mikweb();
        $API->connect($ip, $user, $password);
        // $API->connect('103.169.7.234', 'wildan', '1234');
        $secret = $API->comm('/ppp/secret/print');
        // echo '<pre>';
        // var_dump($secret);
        // echo '</pre>';
        // die;
        $profile = $API->comm('/ppp/profile/print');
        $data = [
            'title' => 'PPP Secret',
            'totalsecret' => count($secret),
            'secret' => $secret,
            'profile' => $profile,
        ];

        $this->load->view('template/main', $data);
        $this->load->view('ppp/secret', $data);
    }

    public function addsecret()
    {
        $ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
        $post = $this->input->post(null, true);
        $API = new Mikweb();
        $API->connect($ip, $user, $password);
        // $API->connect('103.169.7.234', 'wildan', '1234');

        if ($post['localaddress'] == "") {
            $localaddress = "0.0.0.0";
        } else {
            $localaddress = $post['localaddress'];
        }

        if ($post['remoteaddress'] == "") {
            $remoteaddress = "0.0.0.0";
        } else {
            $remoteaddress = $post['remoteaddress'];
        }

        $result =  $API->comm("/ppp/secret/add", array(
            "name"              => $post["name"],
            "password"          => $post["password"],
            "service"           => $post["service"],
            "profile"           => $post["profile"],
            "local-address"     => $localaddress,
            "remote-address"    => $remoteaddress,
            "comment"           => $post["comment"],
        ));

        if ($result) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data. Silakan coba lagi.');
        }

        redirect("ppp/secret");
    }

    public function editsecret()
    {
        $ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
        $post = $this->input->post(null, true);
        $API = new Mikweb();
        $API->connect($ip, $user, $password);
        // $API->connect('103.169.7.234', 'wildan', '1234');

        if ($post['localaddress'] == "") {
            $localaddress = "0.0.0.0";
        } else {
            $localaddress = $post['localaddress'];
        }

        if ($post['remoteaddress'] == "") {
            $remoteaddress = "0.0.0.0";
        } else {
            $remoteaddress = $post['remoteaddress'];
        }

        $API->comm("/ppp/secret/set", array(
            ".id"              => $post["id"],
            "name"              => $post["name"],
            "password"          => $post["password"],
            "service"           => $post["service"],
            "profile"           => $post["profile"],
            "local-address"     => $localaddress,
            "remote-address"    => $remoteaddress,
            "comment"           => $post["comment"],
        ));

        

        redirect("ppp/secret");
    }

    public function delsecret($id){
        $ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
        $API = new Mikweb();
        $API->connect($ip, $user, $password);
        $result =  $API->comm("ppp/secret/remove", array(
            ".id" => '*' . $id
        ));

        if ($result) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal hapus data. Silakan coba lagi.');
        }

        redirect("ppp/secret");
    }
}