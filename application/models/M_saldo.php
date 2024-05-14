<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_saldo extends CI_Model
{

    public function get_saldo($user_id)
    {
        $this->db->select('*');
        $this->db->from('saldo');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }

    public function saldo_all()
    {
        $this->db->select('*');
        $this->db->from('saldo');
        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }


    public function insert($data)
    {
        $this->db->insert('saldo', $data);
    }

    public function get_saldo_by_id($id)
    {
        return $this->db->get_where('saldo', array('id' => $id));
    }

    public function update_saldo($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('saldo', $data);
    }

    public function delete_saldo($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('saldo');
    }

    public function count_nominal($user_id)
    {
        $this->db->select_sum('nominal');
        $this->db->from('saldo');
        $query = $this->db->get();
        return $query->row()->nominal;
    }
}
