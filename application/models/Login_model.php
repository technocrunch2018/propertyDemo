<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
   function loginMe($email, $password)
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('admin_users as BaseTbl');
        $this->db->where('BaseTbl.email', $email);
        $this->db->where('BaseTbl.password', $password);
        $this->db->where('BaseTbl.is_deleted', 0);
        $this->db->where('BaseTbl.status', 1);
        return $this->db->get()->result();
    }    
    
    function loginuser($email, $password)
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('admin_users as BaseTbl');
        $this->db->where('BaseTbl.email', $email);
        $this->db->where('BaseTbl.password', $password);
        $this->db->where('BaseTbl.is_deleted', 0);
        $this->db->where('BaseTbl.status', 1);
        return $query = $this->db->get()->result();
    }
    
}