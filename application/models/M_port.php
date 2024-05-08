<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_port extends CI_Model
{

    public function get_port($user_id)
    {
        $this->db->select('remote_port.*, remote_vpn.nama AS nama_vpn');
        $this->db->from('remote_port');
        $this->db->join('remote_vpn', 'remote_port.vpn_id = remote_vpn.id');
        $this->db->where('remote_port.user_id', $user_id);
        $this->db->order_by('remote_port.id', 'DESC');
        return $this->db->get();
    }

    public function get_all_ports()
    {
        $this->db->select('remote_port.*, remote_vpn.nama AS nama_vpn');
        $this->db->from('remote_port');
        $this->db->join('remote_vpn', 'remote_port.vpn_id = remote_vpn.id');
        $this->db->order_by('remote_port.id', 'DESC');
        return $this->db->get();
    }

    public function insert($data)
    {
        $this->db->insert('remote_port', $data);
    }

    public function get_port_by_id($id)
    {
        return $this->db->get_where('remote_port', array('id' => $id));
    }

    public function update_port($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('remote_port', $data);
    }

    public function delete_port($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('remote_port');
    }
}
