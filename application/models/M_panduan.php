<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_panduan extends CI_Model {

    public function get_panduan()
    {
        $this->db->select('*');
        $this->db->from('panduan');
        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }

    public function vpn_all()
    {
        $this->db->select('*');
        $this->db->from('panduan');
        $this->db->order_by('id', 'DESC');
        return $this->db->get();
    }


    public function insert($data){
        $this->db->insert('panduan', $data);
    }

    public function get_panduan_by_id($id)
    {
        return $this->db->get_where('panduan', array('id' => $id));
    }

    public function update_panduan($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('panduan', $data);
    }

    public function delete_panduan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('panduan');
    }

}