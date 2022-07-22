<?php defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../libraries/TripleDES.php");

class Enkripsi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('enkripsi_m');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->template->load('template', 'enkripsi/enkripsi_data');
    }

    public function encrypt_file()
    {
        $user       = $_SESSION['username'];
        // $key		   = mysql_escape_string(substr(md5($_POST["pwdfile"]), 0,16));
        $key       = md5($_POST["pwdfile"]);

        $deskripsi = mysql_escape_string($_POST['desc']);

        $file_tmpname   = $_FILES['file']['tmp_name'];
        //untuk nama file url
        $file           = rand(1000, 100000) . "-" . $_FILES['file']['name'];
        $new_file_name  = strtolower($file);
        $final_file     = str_replace(' ', '-', $new_file_name);
        //untuk nama file
        $filename       = rand(1000, 100000) . "-" . pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
        $new_filename  = strtolower($filename);
        $finalfile      = str_replace(' ', '-', $new_filename);
        $size           = filesize($file_tmpname);
        $size2          = (filesize($file_tmpname)) / 1024;
        $info           = pathinfo($final_file);
        $file_source        = fopen($file_tmpname, 'rb');
        $ext            = $info["extension"];

        if ($ext == "docx" || $ext == "doc" || $ext == "txt" || $ext == "pdf" || $ext == "xls" || $ext == "xlsx" || $ext == "ppt" || $ext == "pptx") {
        } else {
            $redirect_url = site_url('enkripsi/enkripsi_data/');
            echo ("<script language='javascript'>
            window.alert('Maaf, file yang bisa dienkrip hanya word, excel, text, ppt ataupun pdf.');
            window.location.href = '$redirect_url';
            </script>");
            exit();
        }

        if ($size2 > 3084) {
            $redirect_url = site_url('enkripsi');
            echo ("<script language='javascript'>
            window.alert('Maaf, file tidak bisa lebih besar dari 3MB.');
            window.location.href = '$redirect_url';
            </script>");
            exit();
        }

        // Insert Data to DB
        $this->enkripsi_m->insertEncryptData($user, $final_file, $finalfile, $size2, $key, $deskripsi);

        // Select Data
        $this->enkripsi_m->selectEncryptData($file_url);

        $url   = $finalfile . ".rda";
        $file_url = "file_encrypt/$url";

        // Update Data to DB
        $this->enkripsi_m->updateEncryptData($file_url);

        $file_output        = fopen($file_url, 'wb');

        $mod    = $size % 16;
        if ($mod == 0) {
            $banyak = $size / 16;
        } else {
            $banyak = ($size - $mod) / 16;
            $banyak = $banyak + 1;
        }

        if (is_uploaded_file($file_tmpname)) {
            ini_set('max_execution_time', -1);
            ini_set('memory_limit', -1);

            $data    = stream_get_contents($file_source);
            $cipher   = TripleDES::encrypt($data, $key);

            fwrite($file_output, $cipher);

            fclose($file_source);
            fclose($file_output);

            echo ("<script language='javascript'>
            window.location.href='enkripsi';
            window.alert('Enkripsi Berhasil..');
            </script>");
        } else {
            echo ("<script language='javascript'>
            window.location.href='enkripsi';
            window.alert('Encrypt file mengalami masalah..');
            </script>");
        }
    }
}
