<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leader_ctrl extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level') == "L") {
            redirect('dist/auth_login', 'refresh');
        }
        $this->load->model('Leader_model');
    }
    public function status()
    {
        $data = array(
            'title' => "All Project"
        );
        $this->load->library("pagination");
        $config['base_url'] = base_url('Leader_ctrl/status');
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
        $config['num_tag_open'] = '<li class="page-item disabled">&nbsp;&nbsp;';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '&nbsp;&nbsp;<li class="page-item active"><a class="page-link" href="#" aria-label="Previous">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = '&nbsp;&nbsp;<li class="page-item">&nbsp;&nbsp;<span aria-hidden="true">&raquo;</span>';
        $config['prev_link'] = '<li class="page-item"><span aria-hidden="true">&laquo;</span> &nbsp;&nbsp;';    
        $config['num_link'] = 1;
        $config['first_link'] = false;
        $config['last_link'] = false;
        $page = $this->uri->segment(3, 0);
        $data["select_data"] = $this->Leader_model->select_data($config['per_page'], $page);
        $config['total_rows'] = $this->Leader_model->getTotalrows();
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('dist/leader-status_view', $data);
    }

    public function team_view($id){
        // $value = explode(',', $id);
        $data['team'] = $this->Leader_model->get_team($id);
        $this->load->view('dist/leader-team-view',$data);
    }

    public function change_accept($id)
    {
        $this->Leader_model->change_statusA($id);
        $this->session->set_flashdata('appove_success', TRUE);
        redirect('Leader_ctrl/status');
    }

    public function change_decline($id)
    {
        $this->Leader_model->change_statusD($id);
        $this->session->set_flashdata('decline_success', TRUE);
        redirect('Leader_ctrl/status');
    }

    public function status_approve()
    {
        $data = array(
            'title' => "Approve"
        );
        $this->load->library("pagination");
        $config['base_url'] = base_url('Leader_ctrl/status_approve');
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
        $data["data_approve"] = $this->Leader_model->select_approvr($config['per_page'], $page);
        $config['total_rows'] = $this->Leader_model->getTotalrows();
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('dist/leader-approve_view', $data);
    }

    public function status_wait()
    {
        $data = array(
            'title' => "Waitting"
        );
        $this->load->library("pagination");
        $config['base_url'] = base_url('Leader_ctrl/status_wait');
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
        $data["data_wait"] = $this->Leader_model->select_wait($config['per_page'], $page);
        $config['total_rows'] = $this->Leader_model->getTotalrows();
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('dist/leader-wait_view', $data);
    }

    public function status_decl()
    {
        $data = array(
            'title' => "Decline"
        );
        $this->load->library("pagination");
        $config['base_url'] = base_url('Leader_ctrl/status_decl');
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
        $data["data_decl"] = $this->Leader_model->select_decl($config['per_page'], $page);
        $config['total_rows'] = $this->Leader_model->getTotalrows();
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('dist/leader-decline_view', $data);
    }

    public function assign()
    {
        $data = array(
            'title' => "Assignment"
        );
        $data['user'] = $this->Leader_model->getUser();
        $data['project'] = $this->Leader_model->get_project_name();
        $data["projectC"] = $this->Leader_model->worker();
        $data['module'] = $this->Leader_model->get_module();
        $this->load->view('dist/leader-assign_work_emp', $data);
    }

    public function insert_worker()
    {
        $data = array(
            "project_name" => $this->input->post("project_name"),
            "module_name" => $this->input->post("module_name"),
            "programmer" => $this->input->post("programmer"),
            'date' => date("Y-m-d"),
        );
        $this->Leader_model->insert($data);
        // }
        $this->session->set_flashdata('add1_success', TRUE);
        redirect('leader_ctrl/assign', 'refresh');
    }

    public function generate()
    {
        $data = array(
            'title' => "Generate"
        );
        $this->load->view('dist/generate', $data);
    }

    public function dashboard()
    {
        $data = array(
            'title' => "Dashboard Project"
        );
        $data['countA'] = $this->Leader_model->getCountApprove();
        $data['countD'] = $this->Leader_model->getCountDecline();
        $data['countW'] = $this->Leader_model->getCountWait();
        $data['countAll'] = $this->Leader_model->getCountAll();
        $data['sumAll'] = $this->Leader_model->getSumAll();
        $data['getName'] = $this->Leader_model->getCountName();
        $this->load->view('dist/leader-dashboard_view', $data);
    }
}
