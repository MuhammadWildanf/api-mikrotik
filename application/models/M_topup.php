<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_topup extends CI_Model
{

    public function add_topup($result)
    {
        $user_id = $this->session->userdata('id');
        $data = [
            'order_id' => $result->order_id,
            'user_id' => $user_id,
            'gross_amount' => $result->gross_amount,
            'payment_type' => $result->payment_type,
            'transaction_time' => $result->transaction_time,
            'bank' => $result->va_numbers[0]->bank,
            'va_number' => $result->va_numbers[0]->va_number,
            'pdf_url' => $result->pdf_url,
            'status_code' => $result->status_code
        ];

        return $this->db->insert('transaksi_midtrans', $data);
    }

    // Read - Mendapatkan semua topup berdasarkan user_id
    public function get_topups_by_user($user_id)
    {
        return $this->db->get_where('transaksi_midtrans', array('user_id' => $user_id))->result();
    }

    // Update - Memperbarui status topup
    public function update_topup_status($topup_id, $status)
    {
        $this->db->where('id', $topup_id)->update('transaksi_midtrans', array('status' => $status));
    }
}
