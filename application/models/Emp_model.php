<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Emp_model extends CI_Model
{

	// private $lastQuery = '';

	function __constuct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insert($data)
	{
		$this->db->insert("tasks", $data);
    }
    function select_data()
	{
		$search = $this->input->get('search');
		$this->db->like(array('date'=>$search));
		$this->db->or_like(array('project_name'=>$search));
		$this->db->or_like(array('task_type'=>$search));
		// $this->db->limit($limit, $start);
		$this->db->order_by('id_task  DESC');
		$query = $this->db->get("tasks");
		// $this->lastQuery = $this->db->last_query();
		return $query;
	}
	function getTaskTypes()
	{
		$this->db->order_by('task_type', 'ASC');
		$query = $this->db->get('tasktypes');
		return $query->result();
	}
	function getProjects()
	{
		$this->db->order_by('projectName', 'ASC');
		$query = $this->db->get('projects');
		return $query->result();
	}
	function getModules()
	{
		$this->db->order_by('module_name', 'ASC');
		$query = $this->db->get('wokers');
		return $query->result();
	}

}