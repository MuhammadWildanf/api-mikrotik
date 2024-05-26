<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_saldo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Create - Mencatat transaksi saldo
    public function record_transaction($user_id, $amount, $type)
    {
        $data = array(
            'user_id' => $user_id,
            'amount' => $amount,
            'type' => $type,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('transaksi_saldo', $data);
    }
}
