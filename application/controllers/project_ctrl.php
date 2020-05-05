<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project_ctrl extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level') == "A") {
            redirect('dist/auth_login', 'refresh');
        }
        $this->load->model('Project_model');
    }
    public function project()
    {
        // print_r($_SESSION);
        $data = array(
			'title' => "All Project"
		);
        $this->load->library("pagination");
        $config['base_url'] = base_url('Project_ctrl/project');
        $config['uri_segement'] = 3;
        $config['per_page'] = 5;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="page-item disabled" &nbsp;&nbsp;>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = '&nbsp;&nbsp; Next';
        $config['prev_link'] = 'Prev &nbsp;&nbsp;';    
        $config['num_link'] = 1;
        $config['first_link'] = false;
        $config['last_link'] = false;
        $page = $this->uri->segment(3, 0);
        $data["select_data"] = $this->Project_model->select_data($config['per_page'], $page);
        $config['total_rows'] = $this->Project_model->getTotalrows();
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('dist/admin-project_view', $data);
    }

    public function create_project()
    {
        $data = array(
			'title' => "Create Project"
		);
        $data['team'] = $this->Project_model->getTeam();
        $this->load->view('dist/admin-project_create', $data);
    }

    public function insert_data()
    {
        $projectCode = $this->input->post("projectCode");
        $projectName = $this->input->post("projectName");
        //num rows duplicate
        $this->db->select('projectCode', 'projectName');
        $this->db->where('projectCode', $projectCode, 'projectName', $projectName);
        $query = $this->db->get('projects');
        $num = $query->num_rows();
        if ($num > 0) {
            $this->session->set_flashdata('data_duplicate', TRUE);
            redirect('project_ctrl/project', 'refresh');
        } else {
            $data = array(
                "projectCode" => $this->input->post("projectCode"),
                "projectName" => $this->input->post("projectName"),
                "budget" => $this->input->post("budget"),
                "team" => implode(",",$this->input->post("team")),
                "endDate" => $this->input->post("endDate"),
                "status" => $this->input->post("status")
            );
            $this->Project_model->insert($data);
            $this->session->set_flashdata('save_success', TRUE);
            redirect('project_ctrl/project', 'refresh');
        }
    }

    public function update_project($id)
    {
        $data = array(
			'title' => "Update Project"
		);
        $data['team'] = $this->Project_model->getTeam();
        $data['data'] = $this->Project_model->getbyID($id);
        $this->load->view('dist/admin-project_update', $data);
    }

    public function update_data($id)
    {
        $this->Project_model->update($id);
        $this->session->set_flashdata('save_update', TRUE);
        redirect('Project_ctrl/project', 'refresh');
    }

    public function delete_project($id)
    {
        $this->Project_model->delete($id);
        $this->session->set_flashdata('del_success', TRUE);
        redirect('Project_ctrl/project', 'refresh');
    }
}