<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	function __constuct()
	{
		parent::__construct();
		$this->load->database();
    }
    function getTotalrows()
	{
		$search = $this->input->get('search');
		$this->db->like(array('firstname' => $search));
        $this->db->or_like(array('lastname' => $search));
        $this->db->or_like(array('role' => $search));
		$sql = explode('LIMIT', $this->lastQuery);
		$query = $this->db->query($sql[0]);
		$result = $query->result();
		return count($result);
	}
	function getdata($limit, $start)
	{
        $search = $this->input->get('search');
		$this->db->like(array('firstname' => $search));
        $this->db->or_like(array('lastname' => $search));
        $this->db->or_like(array('role' => $search));
		$this->db->limit($limit, $start);
		$this->db->order_by('idUser', 'ASC');
        $query = $this->db->get('users');
        $this->lastQuery = $this->db->last_query();
		return $query;
    }
    
    function change_level_A($id)
    {
        $data = [
            'level' => 'A',
        ];
        $this->db->where('idUser', $id);
        $this->db->update("users", $data);
    }
    function change_level_L($id)
    {
        $data = [
            'level' => 'L',
        ];
        $this->db->where('idUser', $id);
        $this->db->update("users", $data);
    }
    
    
}