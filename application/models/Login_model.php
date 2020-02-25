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
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$user);
        $this->db->where('password',$pass);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }
    public function email_exists($email){
        $sql = "select firstname, email from users where email = '{$email}' limit 1";
        $result = $this->db->query($sql);
        $row = $result->row();

        return ($result->num_rows() == 1 && $row->email) ? $row->firstname : false;
    }
    public function verify_reset_password_code($email, $code){
        $sql = "select firstname, email from users where email= '{$email}' limit 1";
        $result = $this->db->query($sql);
        $row = $result->row();
        
        if($result->num_rows() === 1){
            return ($code == md5($this->config->item('salt'). $row->firstname)) ? true : false;
        }else{
            return false;
        }
    }
    public function update_password(){
        $email =$this->input->post('email');
        $password = sha1($this->config->item('salt'). $this->input->post('password'));

        $sql = "update users set password = '{$password}' where email ='{$email}' limit 1";
        $this->db->query($sql);

        if ($this->db->db->affected_row() === 1){
            return true;
        }else{
            return false;
        }
    }


}