<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_model extends CI_Model
{
    function __constuct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function insert($data)
	{
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}
}