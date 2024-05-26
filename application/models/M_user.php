<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Mendapatkan saldo pengguna berdasarkan user_id
    public function get_user_balance($user_id)
    {
        $query = $this->db->select('saldo')->get_where('users', array('id' => $user_id));
        return $query->row()->saldo;
    }

    // Update saldo pengguna
    public function update_user_balance($user_id, $new_balance)
    {
        $this->db->set('saldo', $new_balance)->where('id', $user_id)->update('users');
    }

    // Deduct saldo pengguna
    public function deduct_user_balance($user_id, $amount)
    {
        $current_balance = $this->get_user_balance($user_id);
        $new_balance = $current_balance - $amount;
        $this->update_user_balance($user_id, $new_balance);
    }
}
