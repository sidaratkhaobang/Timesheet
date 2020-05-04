<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project_model extends CI_Model
{

	private $lastQuery = '';

	function __constuct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insert($data)
	{
		$this->db->insert("projects", $data);
	}

	function select_data($limit, $start)
	{
		$search = $this->input->get('search');
		$this->db->like(array('projectCode' => $search));
		$this->db->or_like(array('projectName' => $search));
		$this->db->limit($limit, $start);
		$this->db->order_by('idProject  DESC');
		$query = $this->db->get("projects");
		$this->lastQuery = $this->db->last_query();
		return $query;
	}

	function getTotalrows()
	{
		$search = $this->input->get('search');
		$this->db->like(array('projectCode' => $search));
		$this->db->or_like(array('projectName' => $search));
		$sql = explode('LIMIT', $this->lastQuery);
		$query = $this->db->query($sql[0]);
		$result = $query->result();
		return count($result);
	}

	function getTeam()
	{
		$this->db->order_by('team_name', 'ASC');
		$query = $this->db->get('teams');
		return $query->result();
	}


	function delete($id)
	{
		$this->db->delete('projects', array('idProject' => $id));
	}

	function update($id)
	{
		$data = array(
			"projectCode" => $this->input->post("projectCode"),
			"projectName" => $this->input->post("projectName"),
			"budget" => $this->input->post("budget"),
			"team" => implode(",", $this->input->post("team")),
			"endDate" => $this->input->post("endDate")
		);
		$this->db->where(array('idProject' => $id));
		$this->db->update("projects", $data);
	}

	function getbyID($id)
	{
		return $this->db->get_where('projects', array('idProject' => $id))->row();
	}
}
