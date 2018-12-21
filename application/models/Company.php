<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 21/12/2018
 * Time: 9:53
 */

class Company extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function set_company(){
        $data = array(
            'nama' => $this->input->post('nama'),
            'no_telepon' => $this->input->post('no_telepon'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat')
        );
        return $this->db->insert('db_company', $data);
    }

    public function get_company($id = false){
        if ($id){
            return $this->db->get_where('db_company', array('id' => $id))->result_array();
        }
        return $this->db->get('db_company')->result_array();
    }

    public function update_company($id){
        $data = array(
            'nama' => $this->input->post('nama'),
            'no_telepon' => $this->input->post('no_telepon'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'));
        $this->db->where('id', $id);
        $this->db->update('db_company', $data);
    }

    public function delete_company($id){
        return $this->db->delete('db_company', array('id' => $id));
    }

}