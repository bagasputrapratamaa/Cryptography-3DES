<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deskripsi_m extends CI_Model
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

    public function get2($id = null)
    {
        $this->db->select('*');
        $this->db->from('file');
        if ($id != null) {
            $this->db->where('file_id', $id);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataFileByPassword($id_file, $password)
    {
        $this->db->select('password');
        $this->db->from('file');
        if ($id_file != null) {
            $this->db->where('file_id', $id_file);
            $this->db->where('password', $password);
        }
        $query = $this->db->get();
        return $query;
    }
    public function updateStatusFile($id_file, $status)
    {
        $hsl = $this->db->query("UPDATE file SET status='$status' WHERE file_id='$id_file'");
        return $hsl;
    }
}
