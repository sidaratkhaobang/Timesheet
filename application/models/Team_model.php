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
		$data = [
			'level' => 'M',
		];
		$this->db->order_by('firstname', 'ASC');
		$query = $this->db->get_where('users',$data);
		return $query->result();
    }
    
    function insert($data)
	{
		$this->db->insert("teams", $data);
	}

	function getdata()
	{
		$search = $this->input->get('search');	
		$this->db->like(array('team_name' => $search));
		$this->db->or_like(array('member' => $search));
		
		$this->db->order_by('id_team', 'ASC');
		$query = $this->db->get('teams');
		return $query;
	}

	function getbyID($id)
	{
		return $this->db->get_where('teams', array('id_team' => $id))->row();
	}

	function update($id,$data){

		$this->db->where(array('id_team' => $id));
		$this->db->update("teams", $data);
	}

	function delete_package($id)
	{
		$this->db->trans_start();
		$this->db->delete('teams', array('id_team' => $id));
		$this->db->trans_complete();
	}
}
