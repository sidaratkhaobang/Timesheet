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
    function select_data($idUser)
	{
		$search = $this->input->get('search');
		$this->db->like(array('date'=>$search));
		$this->db->or_like(array('project_name'=>$search));
		$this->db->or_like(array('task_type'=>$search));
		//
		// $member_id = $this->session->userdata("idUser");
		$this->db->select('*','u.idUser');
		$this->db->from('tasks as t');
		$this->db->where('t.id_user', $this->session->userdata('idUser'));
		$this->db->join('users as u','t.id_user = u.idUser','match');
		$query = $this->db->get();
		return $query->result();
		// $this->db->select('*');
		// $this->db->order_by($this->id,$this->order);
		// // $this->db->where('tasks.idUser',$this->session->userdata('idUser'));
		// // $this->db->join('users','users.idUser = tasks.idUser');
		// return $this->db->get($this->table);
		 
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
	function getCountProjectTask(){
        $query = "SELECT count(DISTINCT project_name) as total_of_project FROM tasks";
        $result = $this->db->query($query);
        return $result->row()->total_of_project;
	}
	function getHoursJanuary(){
		$query = "SELECT id_user, SUM(hours) as sum_January FROM tasks WHERE ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '01'";
		$result = $this->db->query($query);
		return $result->row()->sum_January;
	}
	function getHoursFebruary(){
		$query = "SELECT id_user, SUM(hours) as sum_February FROM tasks WHERE ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '02'";
		$result = $this->db->query($query);
		return $result->row()->sum_February;
	}
	function getHoursMarch(){
		$query = "SELECT id_user, SUM(hours) as sum_march FROM tasks WHERE ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '03'";
		$result = $this->db->query($query);
		return $result->row()->sum_march;
	}
	function getHoursApril(){
		$query = "SELECT id_user, SUM(hours) as sum_April FROM tasks WHERE ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '04'";
		$result = $this->db->query($query);
		return $result->row()->sum_April;
	}
	function getHoursMay(){
		$query = "SELECT id_user, SUM(hours) as sum_may FROM tasks WHERE ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '05'";
		$result = $this->db->query($query);
		return $result->row()->sum_may;
	}
	function getHoursJune(){
		$query = "SELECT id_user, SUM(hours) as sum_june FROM tasks WHERE ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '06'";
		$result = $this->db->query($query);
		return $result->row()->sum_june;
	}
	function getHoursJuly(){
		$query = "SELECT id_user, SUM(hours) as sum_July FROM tasks WHERE ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '07'";
		$result = $this->db->query($query);
		return $result->row()->sum_July;
	}
	function getHoursAugust(){
		$query = "SELECT id_user, SUM(hours) as sum_August FROM tasks WHERE ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '08'";
		$result = $this->db->query($query);
		return $result->row()->sum_August;
	}
	function getHoursSeptember(){
		$query = "SELECT id_user, SUM(hours) as sum_September FROM tasks WHERE ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '09'";
		$result = $this->db->query($query);
		return $result->row()->sum_September;
	}
	function getHoursOctober(){
		$query = "SELECT id_user, SUM(hours) as sum_October FROM tasks WHERE ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '10'";
		$result = $this->db->query($query);
		return $result->row()->sum_October;
	}
	function getHoursNovember(){
		$query = "SELECT id_user, SUM(hours) as sum_November FROM tasks WHERE ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '11'";
		$result = $this->db->query($query);
		return $result->row()->sum_November;
	}
	function getHoursDecember(){
		$query = "SELECT id_user, SUM(hours) as sum_December FROM tasks WHERE ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '12'";
		$result = $this->db->query($query);
		return $result->row()->sum_December;
	}
	// SELECT id_user, SUM(hours) FROM tasks WHERE YEAR(date) = '2020'
	function getYear2020(){
		$query = "SELECT id_user, SUM(hours) as sum_2020 FROM tasks WHERE YEAR(date) = '2020'";
		$result = $this->db->query($query);
		return $result->row()->sum_2020;
	}
}