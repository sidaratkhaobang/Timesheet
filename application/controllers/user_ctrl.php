<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_ctrl extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level') == "A") {
            redirect('dist/auth_login', 'refresh');
        }
        $this->load->model('User_model');
    }
    public function user()
    {
        // print_r($_SESSION);
        $data = array(
			'title' => "All User"
		);
        $this->load->library("pagination");
        $config['base_url'] = base_url('user_ctrl/user');
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
        $config['cur_tag_open'] = '&nbsp;&nbsp;<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = '<li class="page-item">&nbsp;&nbsp; Next';
        $config['prev_link'] = '<li class="page-item">Prev &nbsp;&nbsp;';    
        $config['num_link'] = 1;
        $config['first_link'] = false;
        $config['last_link'] = false;
        $page = $this->uri->segment(3, 0);
        $data['data_user'] = $this->User_model->getdata($config['per_page'], $page);
        $config['total_rows'] = $this->User_model->getTotalrows();
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('dist/admin-user_view', $data);
    }  
    public function change_admin($id)
    {
        $this->User_model->change_level_A($id);
        $this->session->set_flashdata('level_success', TRUE);
        redirect('user_ctrl/user');
    }

    public function change_leader($id)
    {
        $this->User_model->change_level_L($id);
        $this->session->set_flashdata('level_success', TRUE);
        redirect('user_ctrl/user');
    }
}