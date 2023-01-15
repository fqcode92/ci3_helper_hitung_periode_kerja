<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hitung_periode_kerja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('hitung_periode_kerja');
    }

    public function index()
    {
        echo hitung_periode_kerja('2023-01-01');
    }
}

/* End of file Hitung_periode_kerja.php */
