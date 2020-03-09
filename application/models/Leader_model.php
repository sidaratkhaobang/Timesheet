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

    function getbyID($id)
    {
        return $this->db->get_where('projects', array('idProject' => $id))->row();
    }

    function change_statusA($id)
    {
        $data = [
            'status' => '1',
        ];
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
        $this->db->order_by('idProject');
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
        $this->db->order_by('idProject');
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
        $this->db->order_by('idProject');
        $query = $this->db->get_where("projects", $data);
        $this->lastQuery = $this->db->last_query();
        return $query;
    }
}
