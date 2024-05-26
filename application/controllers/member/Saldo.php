<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saldo extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-auTl9LHRurVWOqffTfGPre_v', 'production' => false);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');
        $this->load->model('m_topup');
        $this->load->model('m_user');
        $this->load->model('m_saldo');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $user_id = $this->session->userdata('id');
        $totalsaldo = $this->m_user->get_user_balance($user_id);
        $midtrans = $this->m_topup->get_topups_by_user($user_id);

        $data = [
            'totalsaldo' => $totalsaldo,
            'midtrans' => $midtrans,
            'title' => 'Top Up Saldo'
        ];

        $this->load->view('member/main');
        $this->load->view('member/saldo', $data);
    }

    public function token()
    {
        $nominal = $this->input->post('nominal');

        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => $nominal,
        );

        // Optional
        $item1_details = array(
            'id' => 'a1',
            'price' => $nominal,
            'quantity' => 1,
            'name' => "Deposit"
        );

        // Optional
        $item_details = array($item1_details);

        // Optional
        $billing_address = array(
            'first_name'    => "Andri",
            'last_name'     => "Litani",
            'address'       => "Mangga 20",
            'city'          => "Jakarta",
            'postal_code'   => "16602",
            'phone'         => "081122334455",
            'country_code'  => 'IDN'
        );

        // Optional
        $shipping_address = array(
            'first_name'    => "Obet",
            'last_name'     => "Supriadi",
            'address'       => "Manggis 90",
            'city'          => "Jakarta",
            'postal_code'   => "16601",
            'phone'         => "08113366345",
            'country_code'  => 'IDN'
        );

        // Optional
        $customer_details = array(
            'first_name'    => "Andri",
            'last_name'     => "Litani",
            'email'         => "andri@litani.com",
            'phone'         => "081122334455",
            'billing_address'  => $billing_address,
            'shipping_address' => $shipping_address
        );

        $credit_card['secure'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'minute',
            'duration'  => 2
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }

    public function finish()
    {
        $result = json_decode($this->input->post('result_data'));
        $user_id = $this->session->userdata('id');
        $simpan = $this->m_topup->add_topup($result);


        if ($simpan) {
            $this->session->set_flashdata('success_msg', 'Transaksi Midtrans berhasil disimpan.');

            if ($result->status_code == "200") {
                $new_balance = $this->m_user->get_user_balance($user_id) + $result->gross_amount;
                $this->m_user->update_user_balance($user_id, $new_balance);
                $this->m_saldo->record_transaction($user_id, $result->gross_amount, 'Topup');
            }
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menyimpan data transaksi Midtrans.');
        }

        redirect('member/saldo');
    }
}
