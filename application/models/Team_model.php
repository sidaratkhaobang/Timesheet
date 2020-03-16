<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Team_model extends CI_Model
{

	function __constuct()
	{
		parent::__construct();
		$this->load->database();
    }

    function getUser()
	{
		$this->db->order_by('firstname', 'ASC');
		$query = $this->db->get('users');
		return $query->result();
    }
    
    function insert($data)
	{
		$this->db->insert("teams", $data);
	}
}
