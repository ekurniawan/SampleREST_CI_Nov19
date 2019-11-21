<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Student extends REST_Controller 
{
    public function index_get(){
        $nim = $this->get('nim');
        if($nim==''){
            $sql = "select * from Student order by nama";
            $data = $this->db->query($sql)->result();
        }
        else {
            $sql = "select * from Student where nim=?";
            $data = $this->db->query($sql,array($nim))->result()[0];
        }
        
        return $this->response($data,200);
    }


    public function showparam_get(){
        $myId = $this->get('id');
        $myName = $this->get('name');
        $data = ['id'=>$myId,'name'=>$myName];
        return $this->response($data,200);
    }

    public function index_post(){
        $nim = $this->post('nim');
        $nama = $this->post('nama');
        $ipk = $this->post('ipk');

        $data = array('nim'=>$nim,'nama'=>$nama,'ipk'=>$ipk);

        return $this->response($data,200);
    }

    public function hitungsegitiga_post(){
        $alas = $this->post("alas");
        $tinggi = $this->post("tinggi");

        $hasil = 0.5*$alas*$tinggi;

        return $this->response("Hasil: $hasil",200);
    }

    public function index_put(){
        $nim = $this->put('nim');
        $nama = $this->put('nama');
        $ipk = $this->put('ipk');

        $data = ['nim'=>$nim,'nama'=>$nama,'ipk'=>$ipk];

        return $this->response($data,200);
    }

    public function index_delete($nim){
        return $this->response("Data $nim berhasil di delete",200);
    }
}

?>