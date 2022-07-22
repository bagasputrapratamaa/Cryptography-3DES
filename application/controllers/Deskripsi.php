<?php defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../libraries/TripleDES.php");

class Deskripsi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('deskripsi_m');
        $this->load->helper('encrypt_helper');
    }

    public function index()
    {
        $data['row'] = $this->deskripsi_m->get();
        $this->template->load('template', 'deskripsi/deskripsi_data', $data);
    }

    public function show($id)
    {
        $data['row'] = $this->deskripsi_m->get($id);

        $this->template->load('template', 'deskripsi/deskripsi_file', $data);
    }

    public function decrypt_file()
    {
        $idfile             = $_POST['fileid'];
        $pwdfile            = substr(md5($_POST["pwdfile"]), 0, 16);
        $file_data_password = $this->deskripsi_m->getDataFileByPassword($idfile, $pwdfile);
        if (count($file_data_password) > 0) {
            $data       = $this->deskripsi_m->get2($idfile);
            $key        = md5($_POST["pwdfile"]);
            $file_path  = $data[0]->file_url;
            $file_name  = $data[0]->file_name_source;
            if (file_exists($file_path)) {
                $this->deskripsi_m->updateStatusFile($idfile, 2);
                $fopen1     = fopen($file_path, "rb");
                $plain      = "";
                $cache      = "file_decrypt/$file_name";
                $fopen2     = fopen($cache, "wb");

                ini_set('max_execution_time', -1);
                ini_set('memory_limit', -1);

                $filedata    = stream_get_contents($fopen1);
                $plain        = TripleDES::decrypt($filedata, $key);
                fwrite($fopen2, $plain);
                $_SESSION["download"] = $cache;
                $redirect_url = site_url('daftar');

                echo ("<script language='javascript'>
                   window.alert('Berhasil mendekripsi file.');
                   window.location.href = '$redirect_url';
                   </script>
                   ");
            } else {
                $redirect_url = site_url('deskripsi/show/' . $idfile);
                echo ("<script language='javascript'>
                window.alert('Maaf, File tidak ditemukan.');
                window.location.href = '$redirect_url';
                </script>");
            }
        } else {
            $redirect_url = site_url('deskripsi/show/' . $idfile);
            echo ("<script language='javascript'>
            window.alert('Maaf, Password tidak sesuai.');
            window.location.href = '$redirect_url';
            </script>");
        }
    }
}
