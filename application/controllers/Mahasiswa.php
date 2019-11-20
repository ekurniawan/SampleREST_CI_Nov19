<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

    public function index()
    { 
        $data['firstname'] = "Erick";
        $data['lastname'] = "Kurniawan";
        $data['arrhobby'] = array('game','gowes','baca');

        $this->load->view("mhs_tampil_view",$data);
    }

}
