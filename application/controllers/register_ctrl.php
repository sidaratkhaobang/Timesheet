<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register_ctrl extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Register_model');
    }
    public function index(){
        $this->load->view('register_view');
    }
    public function validation(){
        $this->form_validation->set_rules('fullname','Full Name','required|trim');
        $this->form_validation->set_rules('username','Name','required|trim');
        $this->form_validation->set_rules('email','Email Address',
        'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run())
        {
            $data = array(
                'fullname' => $this->input->post('fullname'),
                'username' => $this->input->post('username'),
                'email'    => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $id = $this->Register_model->insert($data);
            // if($id > 0)
            // {

            // }
            $this->session->set_flashdata('message','You register success');
            redirect('register_ctrl/index');
        }else
        {
            $this->index();
        }

    }
}   