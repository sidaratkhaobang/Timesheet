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
        // $this->load->library('csvimport');
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
        $config['num_tag_open'] = '<li class="page-item disabled"> &nbsp;&nbsp;';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '&nbsp;&nbsp;<li class="page-item active"><a class="page-link" href="#" aria-label="Previous">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = '&nbsp;&nbsp;<li class="page-item">&nbsp;&nbsp;<span aria-hidden="true">&raquo;</span>';
        $config['prev_link'] = '<li class="page-item"><span aria-hidden="true">&laquo;</span> &nbsp;&nbsp;';
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
        $data['leader'] = $this->Project_model->getLeader();
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
            // redirect('project_ctrl/insert_data', 'refresh');
        } else {
            $data = array(
                "projectCode" => $this->input->post("projectCode"),
                "projectName" => $this->input->post("projectName"),
                "budget" => $this->input->post("budget"),
                "team" => implode(",", $this->input->post("team")),
                "endDate" => $this->input->post("endDate"),
                "status" => $this->input->post("status"),
                "leader" => $this->input->post("leader")
            );
            // $data2 = array(
            //     "project_name" => $this->input->post("projectName"),
            //     "module_name" => $this->input->post("module_mame")
            // );
            $this->Project_model->insert($data);
            // $this->Project_model->insert_module($data2);
            $this->session->set_flashdata('save_success', TRUE);
            redirect('project_ctrl/project', 'refresh');
        }
    }
    public function update_project($id)
    {
        $data = array(
            'title' => "Update Project"
        );
        $data['leader'] = $this->Project_model->getLeader();
        $data['team'] = $this->Project_model->getTeam();
        $data['data'] = $this->Project_model->getbyID($id);
        $this->load->view('dist/admin-project_update', $data);
    }

    public function update_data($id)
    {
        $data = array(
            "projectCode" => $this->input->post("projectCode"),
            "projectName" => $this->input->post("projectName"),
            "budget" => $this->input->post("budget"),
            "team" => implode(",", (array) $this->input->post("team[]")),
            "endDate" => $this->input->post("endDate"),
            "leader" => $this->input->post("leader")
        );
        $this->Project_model->update($id, $data);
        $this->session->set_flashdata('save_update', TRUE);
        redirect('Project_ctrl/project', 'refresh');
    }

    public function delete_project($id)
    {
        $this->Project_model->delete($id);
        $this->session->set_flashdata('del_success', TRUE);
        redirect('Project_ctrl/project', 'refresh');
    }

    public function status_approve()
    {
        $data = array(
            'title' => "Approve"
        );
        $this->load->library("pagination");
        $config['base_url'] = base_url('Project_ctrl/status_approve');
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
        $data["data_approve"] = $this->Project_model->select_approvr($config['per_page'], $page);
        $config['total_rows'] = $this->Project_model->getTotalrows();
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('dist/admin-approve_view', $data);
    }

    public function status_wait()
    {
        $data = array(
            'title' => "Waitting"
        );
        $this->load->library("pagination");
        $config['base_url'] = base_url('Project_ctrl/status_wait');
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
        $data["data_wait"] = $this->Project_model->select_wait($config['per_page'], $page);
        $config['total_rows'] = $this->Project_model->getTotalrows();
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('dist/admin-wait_view', $data);
    }

    public function status_decl()
    {
        $data = array(
            'title' => "Decline"
        );
        $this->load->library("pagination");
        $config['base_url'] = base_url('Project_ctrl/status_decl');
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
        $data["data_decl"] = $this->Project_model->select_decl($config['per_page'], $page);
        $config['total_rows'] = $this->Project_model->getTotalrows();
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('dist/admin-decline_view', $data);
    }

}
