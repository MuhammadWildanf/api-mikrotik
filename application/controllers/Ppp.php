<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppp extends CI_Controller
{

    public function secret()
    {
        $API = new Mikweb();
        $API->connect('103.169.7.234', 'wildan', '1234');
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
        $post = $this->input->post(null, true);
        $API = new Mikweb();
        $API->connect('103.169.7.234', 'wildan', '1234');
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

        $API->comm("/ppp/secret/add", array(
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
}
