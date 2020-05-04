<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Emp_model extends CI_Model
{

	// private $lastQuery = '';
	public $table = 'tasks';
	public $id = 'id_task';
	public $order ='DESC';

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
		//
		$this->db->select('*');
		$this->db->order_by($this->id,$this->order);
		// $this->db->where('tasks.idUser',$this->session->userdata('idUser'));
		// $this->db->join('users','users.idUser = tasks.idUser');
		return $this->db->get($this->table);
		 
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