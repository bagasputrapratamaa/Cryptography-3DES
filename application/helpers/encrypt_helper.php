<?php

function decrypt_file($file, $password)
{
    $ci = &get_instance();
    $ci->load->library('TripleDES', 'tripledes');

    if ($ci->tripledes->decrypt_file($file, $password)) {
        var_dump($ci->tripledes->decrypt_file($file, $password));
    }
}
