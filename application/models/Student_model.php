<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CI_Model
{
    public function getall()
    {
        $this->db->order_by('nama', 'ASC');
        $data = $this->db->get('Student')->result();
        return $data;
    }

    public function getbyid($nim){
        $this->db->where('nim',$nim);
        $data = $this->db->get('Student')->result()[0];
        return $data;
    }

    public function getbyname($nama){
        $this->db->like('nama',$nama);
        $data = $this->db->get('Student')->result();
        return $data;
    }

    public function insert($data){
        $result = $this->db->insert($data);
        return $result;
    }
}
