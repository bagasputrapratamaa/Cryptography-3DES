<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('users');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['username'] = $post['username'];
        $params['fullname'] = $post['fullname'];
        $params['password'] = sha1($post['password']);
        $params['job_title'] = $post['jobtitle'];
        $params['level'] = $post['level'];

        $this->db->insert('users', $params);
    }

    public function edit($post)
    {
        $params['username'] = $post['username'];
        $params['fullname'] = $post['fullname'];
        if (!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $params['job_title'] = $post['jobtitle'];
        $params['level'] = $post['level'];

        $this->db->where('user_id', $post['user_id']);
        $this->db->update('users', $params);
    }

    public function del($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('users');
    }
}
