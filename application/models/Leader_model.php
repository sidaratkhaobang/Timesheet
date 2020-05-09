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
        $this->db->order_by('idProject  DESC');
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
        $this->db->order_by('idProject DESC');
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
        $this->db->order_by('idProject DESC');
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
        $this->db->order_by('idProject DESC');
        $query = $this->db->get_where("projects", $data);
        $this->lastQuery = $this->db->last_query();
        return $query;
    }

    function getUser()
    {
        $this->db->order_by('firstname', 'ASC');
        $query = $this->db->get('users');
        return $query->result();
    }

    function getProjectCode()
    {
        $this->db->order_by('projectCode', 'ASC');
        $query = $this->db->get('projects');
        return $query->result();
    }

    function insert($data)
    {
        $this->db->insert_batch("wokers", $data);
    }

    function worker()
    {
        // $query = $this->db->group_by('wokers', array('project_code'));  ,'system_name','module_name','programmer'
        // $this->db->select('project_code');
        // $this->db->group_by('project_code');
        // $this->db->order_by('project_code DESC');
        $query = $this->db->get('wokers'); // table name
        // if ($query->num_rows() > 0) {
        //     return $query->result();
        // }
        // $this->db->group_by('project_code');
        // $query = $this->db->get("wokers");
        return $query;
    }


    // function select_worker($code)
    // {
    //     $this->db->select('system_name','module_name','programmer');
    //     $this->db->where('project_code', $code);
    //     $query = $this->db->get_where('wokers', $code); // table name
    //     if ($query->num_rows() > 0) {
    //         return $query->result();
    //     }
    // }

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
        $this->db->selectCount('budget');
        // $this->db->select_sum('budget');
        $result = $this->db->get_where("projects", $data);
        return $result->row()->budget;
    }

    function getCountName()
    {
        $this->db->distinct();
        $this->db->select('project_name, score_type, budget');
        $this->db->from('tasktypes');
        $this->db->join('tasks', 'tasktypes.task_type = tasks.task_type');
        $this->db->join('projects', 'projects.projectName = tasks.project_name');
        $this->db->group_by('tasks.project_name');
        $query = $this->db->get();
        return $query;
    }

}
