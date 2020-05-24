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

	function insert_module($data)
	{
		$this->db->insert_batch("detail_project", $data);
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

	function getLeader()
	{
		$data = [
			'level' => 'L',
		];
		$this->db->order_by('firstname', 'ASC');
		$query = $this->db->get_where('users', $data);
		return $query->result();
	}

	function delete($id)
	{
		$this->db->delete('projects', array('idProject' => $id));
	}

	function update($id, $data)
	{
		$this->db->where(array('idProject' => $id));
		$this->db->update("projects", $data);
	}

	function getbyID($id)
	{
		return $this->db->get_where('projects', array('idProject' => $id))->row();
	}

	function select()
	{
		$this->db->order_by('id_detail', 'DESC');
		$query = $this->db->get('detail_project');
		return $query;
	}

	function insert_detail($data)
	{
		$this->db->insert_batch('detail_project', $data);
	}

	function getCountApprove()
    {
        $sql = "SELECT count(if(status='1',status,NULL)) as status FROM projects";
        $result = $this->db->query($sql);
        return $result->row();
    }

    function getCountDecline()
    {
        $sql = "SELECT count(if(status='2',status,NULL)) as status FROM projects";
        $result = $this->db->query($sql);
        return $result->row();
    }

    function getCountWait()
    {
        $sql = "SELECT count(if(status='3',status,NULL)) as status FROM projects";
        $result = $this->db->query($sql);
        return $result->row();
	}
	function select_approvr($limit, $start)
    {
        $data = [
            'status' => '1',
        ];
        $this->db->limit($limit, $start);
        $this->db->order_by('idProject ASC');
        $query = $this->db->get_where("projects", $data);
        $this->lastQuery = $this->db->last_query();
        return $query;
    }

    function select_wait($limit, $start)
    {
        $data = [
            'status' => '3',
        ];
        $this->db->limit($limit, $start);
        $this->db->order_by('idProject ASC');
        $query = $this->db->get_where("projects", $data);
        $this->lastQuery = $this->db->last_query();
        return $query;
    }

    function select_decl($limit, $start)
    {
        $data = [
            'status' => '2',
        ];
        $this->db->limit($limit, $start);
        $this->db->order_by('idProject ASC');
        $query = $this->db->get_where("projects", $data);
        $this->lastQuery = $this->db->last_query();
        return $query;
    }
}
