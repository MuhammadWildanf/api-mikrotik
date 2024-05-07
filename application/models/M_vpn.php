<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_vpn extends CI_Model {

    public function get_vpn($user_id)
    {
        $this->db->select('*');
        $this->db->from('remote_vpn');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }

    public function insert($data){
        $this->db->insert('remote_vpn', $data);
    }

    public function get_vpn_by_id($id)
    {
        return $this->db->get_where('remote_vpn', array('id' => $id));
    }

    public function update_vpn($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('remote_vpn', $data);
    }

    public function delete_vpn($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('remote_vpn');
    }
}