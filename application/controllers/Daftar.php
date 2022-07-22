<?php defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('daftar_m');
    }

    public function index()
    {
        $data['row'] = $this->daftar_m->get();
        $this->template->load('template', 'daftar/daftar_data', $data);
    }

    public function del($id)
    {
        $this->daftar_m->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Hapus!');</script>";
        }
        echo "<script>window.location='" . site_url('daftar') . "'</script>";
    }
}
