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
        $data["select_data"] = $this->Leader_model->select_data($config['per_page'], $page);
        $config['total_rows'] = $this->Leader_model->getTotalrows();
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('dist/leader-status_view', $data);
    }

    public function dashboard()
    {
        $data = array(
            'title' => "Dashboard Project"
        );
        $this->load->view('dist/leader-dashboard_view', $data);
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
            'title' => "Assignment of Member"
        );
        $data["projectC"] = $this->Leader_model->worker();
        $this->load->view('dist/leader-assign_work_emp', $data);;
    }

    public function new_worker()
    {
        $data = array(
            'title' => "New Worker"
        );
        $data['user'] = $this->Leader_model->getUser();
        $data['project'] = $this->Leader_model->getProjectCode();
        $this->load->view('dist/leader-add_worker', $data);
    }

    public function insert_worker()
    {
        if ($_POST) {
            $data = [];
            for ($i = 0; $i < count($this->input->post('project_code')); $i++) {
                $data[$i] = array(
                    'project_code' => $this->input->post('project_code')[$i],
                    'system_name' => $this->input->post('system_name')[$i],
                    'module_name' => $this->input->post('module_name')[$i],
                    'programmer' => $this->input->post('programmer')[$i]
                );
            }
            $this->Leader_model->insert($data);
        }
        $this->session->set_flashdata('save_success', TRUE);
        redirect('leader_ctrl/assign', 'refresh');
    }

    public function detail($code)
    {
        $data = array(
            'title' => "Detail Worker"
        );
        // $data["projectC"] = $this->Leader_model->select_worker($code);
        $this->load->view('dist/leader-worker_view', $data);
    }
}
