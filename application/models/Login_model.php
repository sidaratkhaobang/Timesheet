<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    function __constuct()
	{
		parent::__construct();
		$this->load->database();
    }
    public function list_users($user,$pass){
        $this->db->select('fullname,username,password,level');
        $this->db->from('users');
        $this->db->where('username',$user);
        $this->db->where('password',$pass);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }
    
}