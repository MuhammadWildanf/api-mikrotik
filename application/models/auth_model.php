<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth_model extends CI_Model
{

    public function simpan_register($data)
    {

        return $this->db->insert("users", $data);
    }

    public function cek_login($nama, $password)
    {

        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("nama", $nama);
        $query = $this->db->get();
        $user = $query->row();

        /**
         * Check password
         */
        if (!empty($user)) {

            if (password_verify($password, $user->password)) {

                return $query->result();
            } else {

                return FALSE;
            }
        } else {

            return FALSE;
        }
    }
}
