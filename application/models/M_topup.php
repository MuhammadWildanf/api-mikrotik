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
            'status_code' => $result->status_code
        ];

        // Periksa tipe pembayaran
        if ($result->payment_type !== 'qris') {
            // Pastikan va_numbers tersedia dan tidak null
            if (!empty($result->va_numbers) && isset($result->va_numbers[0]->bank, $result->va_numbers[0]->va_number)) {
                $data['bank'] = $result->va_numbers[0]->bank;
                $data['va_number'] = $result->va_numbers[0]->va_number;
            } else {
                // Tangani kasus jika va_numbers tidak tersedia atau null
                $data['bank'] = null;
                $data['va_number'] = null;
            }
        } else {
            // Set nilai null jika tipe pembayaran adalah qris
            $data['bank'] = null;
            $data['va_number'] = null;
        }

        // Periksa apakah pdf_url tersedia
        if (isset($result->pdf_url)) {
            $data['pdf_url'] = $result->pdf_url;
        } else {
            $data['pdf_url'] = null;
        }

        // Hapus elemen 'bank', 'va_number', dan 'pdf_url' jika tipe pembayaran adalah qris
        if ($result->payment_type === 'qris') {
            unset($data['bank']);
            unset($data['va_number']);
            unset($data['pdf_url']);
        }

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
