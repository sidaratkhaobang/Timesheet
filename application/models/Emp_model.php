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

	function insert_data($data)
	{
		$this->db->insert("trackers", $data);
	}

	function select_data()
	{
		$member_id = $this->session->userdata("idUser");
		$data = [
			'id_user' => $member_id,
		];
		$this->db->order_by('id_task  DESC');
		$query = $this->db->get_where("tasks", $data);

		$search = $this->input->get('search');
		$this->db->like(array('date' => $search));
		$this->db->or_like(array('project_name' => $search));
		$this->db->or_like(array('task_type' => $search));
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
		$data = [
			'status' => '1',
		];
		$this->db->order_by('projectName', 'ASC');
		$query = $this->db->get_where("projects", $data);
		return $query->result();
	}

	function getModules()
	{
		$this->db->order_by('module_name', 'ASC');
		$query = $this->db->get('wokers');
		return $query->result();
	}

	function getCountProjectTask()
	{
		$member_id = $this->session->userdata("idUser");
		$query = "SELECT count(DISTINCT project_name) as total_of_project FROM tasks WHERE id_user = '$member_id' ";
		$result = $this->db->query($query);
		return $result->row()->total_of_project;
	}

	function select_data_assign()
	{
		$member_id = $this->session->userdata("email");
		$this->db->select('wokers.*');
		$this->db->from('wokers');
		$this->db->where('programmer', $member_id );
		$query = $this->db->get();
		return $query;
	}

	function getCountAssign()
	{
		$member_id = $this->session->userdata("email");
		// $query = "SELECT count('id_worker') as total FROM wokers WHERE programmer = '$member_id' ";
		// $result = $this->db->query($query);
		$this->db->select('wokers.*,count(id_worker) as total');
		$this->db->from('wokers');
		$this->db->where('programmer', $member_id);
		// $query = "SELECT count('wokers.id_worker') as total FROM wokers JOIN users WHERE 'users.email = wokers.programmer'";
		// $result = $this->db->query($query);
		$result = $this->db->get();
		return $result->row()->total;
	}

	function getHoursJanuary()
	{
		$member_id = $this->session->userdata("idUser");
		$query = "SELECT id_user, SUM(hours) as sum_January FROM tasks  WHERE id_user = '$member_id' AND ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '01'";
		$result = $this->db->query($query);
		return $result->row()->sum_January;
	}

	function getHoursFebruary()
	{
		$member_id = $this->session->userdata("idUser");
		$query = "SELECT id_user, SUM(hours) as sum_February FROM tasks  WHERE id_user = '$member_id' AND ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '02'";
		$result = $this->db->query($query);
		return $result->row()->sum_February;
	}

	function getHoursMarch()
	{
		$member_id = $this->session->userdata("idUser");
		$query = "SELECT id_user, SUM(hours) as sum_march FROM tasks WHERE id_user = '$member_id' AND ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '03'";
		$result = $this->db->query($query);
		return $result->row()->sum_march;
	}

	function getHoursApril()
	{
		$member_id = $this->session->userdata("idUser");
		$query = "SELECT id_user, SUM(hours) as sum_April FROM tasks WHERE id_user = '$member_id' AND ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '04'";
		$result = $this->db->query($query);
		return $result->row()->sum_April;
	}
	function getHoursMay()
	{
		$member_id = $this->session->userdata("idUser");
		$query = "SELECT id_user, SUM(hours) as sum_may FROM tasks WHERE id_user = '$member_id' AND ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '05'";
		$result = $this->db->query($query);
		return $result->row()->sum_may;
	}
	function getHoursJune()
	{
		$member_id = $this->session->userdata("idUser");
		$query = "SELECT id_user, SUM(hours) as sum_june FROM tasks  WHERE id_user = '$member_id' AND ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '06'";
		$result = $this->db->query($query);
		return $result->row()->sum_june;
	}
	function getHoursJuly()
	{
		$member_id = $this->session->userdata("idUser");
		$query = "SELECT id_user, SUM(hours) as sum_July FROM tasks  WHERE id_user = '$member_id' AND ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '07'";
		$result = $this->db->query($query);
		return $result->row()->sum_July;
	}
	function getHoursAugust()
	{
		$member_id = $this->session->userdata("idUser");
		$query = "SELECT id_user, SUM(hours) as sum_August FROM tasks  WHERE id_user = '$member_id' AND ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '08'";
		$result = $this->db->query($query);
		return $result->row()->sum_August;
	}
	function getHoursSeptember()
	{
		$member_id = $this->session->userdata("idUser");
		$query = "SELECT id_user, SUM(hours) as sum_September FROM tasks  WHERE id_user = '$member_id' AND ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '09'";
		$result = $this->db->query($query);
		return $result->row()->sum_September;
	}
	function getHoursOctober()
	{
		$member_id = $this->session->userdata("idUser");
		$query = "SELECT id_user, SUM(hours) as sum_October FROM tasks  WHERE id_user = '$member_id' AND ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '10'";
		$result = $this->db->query($query);
		return $result->row()->sum_October;
	}
	function getHoursNovember()
	{
		$member_id = $this->session->userdata("idUser");
		$query = "SELECT id_user, SUM(hours) as sum_November FROM tasks  WHERE id_user = '$member_id' AND ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '11'";
		$result = $this->db->query($query);
		return $result->row()->sum_November;
	}
	function getHoursDecember()
	{
		$member_id = $this->session->userdata("idUser");
		$query = "SELECT id_user, SUM(hours) as sum_December FROM tasks  WHERE id_user = '$member_id' AND ( DAY(date) BETWEEN 01 AND 31 ) AND MONTH(date) = '12'";
		$result = $this->db->query($query);
		return $result->row()->sum_December;
	}
	// SELECT id_user, SUM(hours) FROM tasks WHERE YEAR(date) = '2020'
	function getYear2020()
	{
		$member_id = $this->session->userdata("idUser");
		$query = "SELECT id_user, SUM(hours) as sum_2020 FROM tasks  WHERE id_user = '$member_id' AND YEAR(date) = '2020'";
		$result = $this->db->query($query);
		return $result->row()->sum_2020;
	}
}
