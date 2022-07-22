<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('user_m');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['row'] = $this->user_m->get();

        $this->template->load('template', 'user/user_data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]');
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|min_length[5]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules(
            'passconf',
            'Konfirmasi Password!',
            'required|matches[password]',
            array('matches' => '%s Password tidak sesuai')
        );
        $this->form_validation->set_rules('jobtitle', 'Job', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s Masih Kosong! harap diisi');
        $this->form_validation->set_message('min_length', '{field} Minimal 5 karakter');


        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'user/user_form_add');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->user_m->add($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data Berhasil Ditambahkan!');</script>";
            }
            echo "<script>window.location='" . site_url('user') . "'</script>";
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|min_length[5]');
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
            $this->form_validation->set_rules(
                'passconf',
                'Konfirmasi Password!',
                'matches[password]',
                array('matches' => '%s Password tidak sesuai')
            );
        }
        if ($this->input->post('passconf')) {
            $this->form_validation->set_rules(
                'passconf',
                'Konfirmasi Password!',
                'required|matches[password]',
                array('matches' => '%s Password tidak sesuai')
            );
        }
        $this->form_validation->set_rules('jobtitle', 'Job', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s Masih Kosong! harap diisi');
        $this->form_validation->set_message('min_length', '{field} Minimal 5 karakter');


        if ($this->form_validation->run() == FALSE) {
            $query = $this->user_m->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'user/user_form_edit', $data);
            } else {
                echo "<script>alert('Data Tidak Ditemukan!');";
                echo "window.location='" . site_url('user') . "'</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->user_m->edit($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data Berhasil Disimpan!');</script>";
            }
            echo "<script>window.location='" . site_url('user') . "'</script>";
        }
    }

    public function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM users WHERE username = '$post[username]' AND user_id !='$post[user_id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', 'Username ini sudah ada / digunakan!');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function del()
    {
        $id = $this->input->post('user_id');
        $this->user_m->del($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Hapus!');</script>";
        }
        echo "<script>window.location='" . site_url('user') . "'</script>";
    }
}
