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
}
