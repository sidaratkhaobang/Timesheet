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
        redirect('dist/auth_register');
        // $this->load->view('dist/auth-register');
        // echo base_url('dist/auth-register');
        
    }
    public function validation(){
        $email = $this->input->post("email");
        //num rows duplicate
        $this->db->select('email');
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        $num = $query->num_rows();
        if ($num > 0) {
            $this->session->set_flashdata('un_success', TRUE);
            redirect('register_ctrl/index', 'refresh');
        } else {
            $data = array(
                "firstname" => $this->input->post("firstname"),
                "lastname" => $this->input->post("lastname"),
                "email" => $this->input->post("email"),
                "password" => $this->input->post("password"),
            );
            $this->Register_model->insert($data);
            $this->session->set_flashdata('regis_success', TRUE);
            redirect('register_ctrl/index1', 'refresh');
        }
        // $this->form_validation->set_rules('firstname','First Name','required|trim');    
        // $this->form_validation->set_rules('lastname','Last name','required|trim');
        // $this->form_validation->set_rules('email','Email Address',
        // 'required|trim|valid_email|is_unique[users.email]');
        // $this->form_validation->set_rules('password','Password','required');
        // if($this->form_validation->run())
        // {
        //     $data = array(
        //         'firstname' => $this->input->post('firstname'),
        //         'lastname' => $this->input->post('lastname'),
        //         'email'    => $this->input->post('email'),
        //         'password' => $this->input->post('password')
        //     );
        //     $id = $this->Register_model->insert($data);
        //     // if($id > 0)
        //     // {

        //     // }
        //     $this->session->set_flashdata('message','You register success');
        //     redirect('register_ctrl/register');
        // }else
        // {
        //     $this->register();
        // }
        
    }
    public function index1(){
        redirect('dist/auth_login');
    }
}   