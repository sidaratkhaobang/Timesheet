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
        $this->load->view('dist/auth-register');
    }
    public function validation(){
        $this->form_validation->set_rules('firstname','First Name','required|trim');
        $this->form_validation->set_rules('lastname','Last name','required|trim');
        $this->form_validation->set_rules('email','Email Address',
        'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run())
        {
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
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