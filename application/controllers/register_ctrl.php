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
            $this->session->set_flashdata('unsuccess', TRUE);
            // redirect('register_ctrl/index', 'refresh');
        } else {
            $data = array(
                "level" => "M",
                "firstname" => $this->input->post("firstname"),
                "lastname" => $this->input->post("lastname"),
                "email" => $this->input->post("email"),
                "password" => $this->input->post("password"),
            );
            $this->Register_model->insert($data);
            $this->session->set_flashdata('regis_success', TRUE);
            redirect('register_ctrl/index1', 'refresh');
        }
        // $email = $this->input->post("email");
        // //num rows duplicate
        // $this->db->select('email');
        // $this->db->where('email', $email);
        // $query = $this->db->get('users');
        // $num = $query->num_rows();
        // $this->load->library('form_validation');
       
        // // field name, error message, validation rules
        // $this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
        // $this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
        // $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
        // $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        // $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
        // if($this->form_validation->run())
        // {
        //     $data = array(
        //         "level" => "M",
        //         'firstname' => $this->input->post('firstname'),
        //         'lastname' => $this->input->post('lastname'),
        //         'email'    => $this->input->post('email'),
        //         'password' => $this->input->post('password')
        //     );
        //     $this->Register_model->insert($data);
        //      $this->session->set_flashdata('regis_success', TRUE);
        //      redirect('register_ctrl/index1', 'refresh');
        // }else{
        //  $this->session->set_flashdata('un_success', TRUE);
        //    redirect('register_ctrl/index', 'refresh');
        // }
        
    }
    public function index1(){
        redirect('dist/auth_login');
    }
}   