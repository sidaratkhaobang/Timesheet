<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Leader_model extends CI_Model
{

    function __constuct()
    {
        parent::__construct();
        $this->load->database();
    }

    function select_data($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('idProject  ASC');
        $query = $this->db->get("projects");
        $this->lastQuery = $this->db->last_query();
        return $query;
    }

    function getTotalrows()
    {
        $sql = explode('LIMIT', $this->lastQuery);
        $query = $this->db->query($sql[0]);
        $result = $query->result();
        return count($result);
    }

    // function getbyID($id)
    // {
    //     return $this->db->get_where('projects', array('idProject' => $id))->row();
    // }

    function change_statusA($id)
    {
        $data = [
            'status' => '1',
            'startDate' => date("Y-m-d"),
        ];
        // $today = date("Y-m-d");
        $this->db->where('idProject', $id);
        $this->db->update("projects", $data);
    }

    function change_statusD($id)
    {
        $data = [
            'status' => '2',
        ];
        $this->db->where('idProject', $id);
        $this->db->update("projects", $data);
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

    function getUser()
    {
        $data = [
            'level' => 'M',
        ];
        $this->db->order_by('email', 'ASC');
        $query = $this->db->get_where('users',$data);
        return $query;
    }

    function getProjectCode()
    {
        $data = [
            'status' => '1',
        ];
        $this->db->order_by('projectName', 'ASC');
        $query = $this->db->get_where('projects', $data);
        return $query;
    }

    function insert($data)
    {
        $this->db->insert("wokers", $data);
        // $this->db->insert_batch("wokers", $data);
    }

    function worker()
    {
        $this->db->order_by('project_name DESC');
        $query = $this->db->get('wokers'); // table name
        return $query;
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

    function getCountAll()
    {
        $sql = "SELECT count(projectName) as projectName FROM projects";
        $result = $this->db->query($sql);
        return $result->row()->projectName;
    }

    function getSumAll()
    {
        $data = [
            'status' => '1',
        ];
        $this->db->select_sum('budget');
        $result = $this->db->get_where("projects", $data);
        return $result->row()->budget;
    }

    function getCountName()
    {
        $this->db->distinct();
        $this->db->select('trackers.project_name, trackers.task_type, tasktypes.score_type, projects.budget');
        $this->db->from('trackers');
        $this->db->join('tasktypes', 'tasktypes.task_type = trackers.task_type');
        $this->db->join('projects', 'projects.projectName = trackers.project_name');
        $this->db->group_by('trackers.project_name');
        $query = $this->db->get();
        return $query;
    }

}
