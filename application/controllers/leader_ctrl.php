<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leader_ctrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        redirect('Leader_ctrl/status');
    }

    public function change_decline($id)
    {
        $this->Leader_model->change_statusD($id);
        redirect('Leader_ctrl/status');
    }

    public function status_approve()
    {
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

    public function status_wait(){
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

    public function status_decl(){
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
}
