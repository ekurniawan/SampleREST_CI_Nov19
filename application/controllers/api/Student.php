<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Student extends REST_Controller
{
    /*public function index_get()
    {
        $nim = $this->get('nim');
        if ($nim == '') {
            $sql = "select * from Student order by nama";
            $data = $this->db->query($sql)->result();
        } else {
            $sql = "select * from Student where nim=?";
            $data = $this->db->query($sql, array($nim))->result()[0];
        }

        return $this->response($data, 200);
    }*/

    /*public function index_get(){
        $nim = $this->get('nim');
        if($nim==''){
            $this->db->order_by('nama','ASC');
            $data = $this->db->get('Student')->result();
        }
        else {
            $this->db->where('nim',$nim);
            $data = $this->db->get('Student')->result();
        }
        return $this->response($data);
    }*/

    public function index_get(){
        $this->load->model('Student_model');
        $nim = $this->get('nim');

        if($nim==''){
            $data = $this->Student_model->getall();
        }
        else {
            $data = $this->Student_model->getbyid($nim);
        }
        
        return $this->response($data,200);
    }

    public function getbyname_get($nama)
    {
        $this->load->model('Student_model');
        /*$sql = "select * from Student where nama like ?";
        $data = $this->db->query($sql, array('%' . $nama . '%'))->result();*/
        $data = $this->Student_model->getbyname($nama);
        return $this->response($data, 200);
    }

    /*public function index_post()
    {
        $nim = $this->post('nim');
        $nama = $this->post('nama');
        $email = $this->post('email');
        $ipk = $this->post('ipk');

        $data = ['nim' => $nim, 'nama' => $nama, 'email' => $email, 'ipk' => $ipk];
        $sql = "insert into Student(nim,nama,email,ipk) values(?,?,?,?)";

        $result = $this->db->query($sql, array($nim, $nama, $email, $ipk));
        if ($result) {
            return $this->response($data, 201);
        } else {
            return $this->response("Gagal Insert Data !", 400);
        }
    }*/

    public function index_post(){
        $this->load->model('Student_model');
        $nim = $this->post('nim');
        $nama = $this->post('nama');
        $email = $this->post('email');
        $ipk = $this->post('ipk');

        $data = ['nim' => $nim, 'nama' => $nama, 'email' => $email, 'ipk' => $ipk];
        $result = $this->Student_model->insert($data);
        if($result){
            return $this->response($data,201);
        }
        else {
            return $this->response("Gagal insert data !",400);
        }
    }

    /*public function index_put()
    {
        $nim = $this->put('nim');
        $nama = $this->put('nama');
        $email = $this->put('email');
        $ipk = $this->put('ipk');

        $sql = "update Student set nama=?,email=?,ipk=? where nim=?";
        $result = $this->db->query($sql,array($nama,$email,$ipk,$nim));
        if($result){
            return $this->response("Data berhasil diupdate",200);
        }
        else {
            return $this->response("Data gagal diupdate",400);
        }
        
    }*/

    public function index_put(){
        $this->load->model('Student_model');

        $nim = $this->put('nim');
        $nama = $this->put('nama');
        $email = $this->put('email');
        $ipk = $this->put('ipk');

        $data = ['nama'=>$nama,'email'=>$email,'ipk'=>$ipk];
        
        $result = $this->Student_model->update($nim,$data);
        
        if($result){
            return $this->response("Data Berhasil di Update",200);
        }
        else {
            return $this->response("Data gagal diupdate",400);
        }
    }

    /*public function index_delete($nim)
    {
        $sql = "delete from Student where nim=?";
        $result = $this->db->query($sql,array($nim));
        if($result){
            return $this->response("Data berhasil di delete",200);
        }
        else {
            return $this->response("Data gagal di delete",400);
        }
    }*/

    public function index_delete($nim)
    {
        $this->load->model('Student_model');
        $result = $this->Student_model->delete($nim);
        if($result){
            return $this->response("Data berhasil di delete",200);
        }
        else {
            return $this->response("Data gagal di delete",400);
        }
    }
}
