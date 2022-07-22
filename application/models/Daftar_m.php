<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('file');
        if ($id != null) {
            $this->db->where('file_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('file_id', $id);
        $this->db->delete('file');
    }
}
