<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_ctrl extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }
    public function index(){
        $this->load->view('login_view');
    }
    public function adding(){
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
    }
    public function register(){
        $this->load->view('register_view');
    }
    public function login(){
        $user=$this->input->post('username',TRUE);
        $pass=$this->input->post('password',TRUE);
        $checklogin = $this->Login_model->list_users($user,$pass);

        if($checklogin){
            foreach($checklogin as $row);
            $this->session->set_userdata('username',$row->username);
            $this->session->set_userdata('level',$row->level);

            if($this->session->userdata('level')=="A"){
                redirect('Project_ctrl/project','refresh');
            }elseif($this->session->userdata('level')=="M"){
                echo 'Hello Member';
            }
            elseif($this->session->userdata('level')=="L"){
            echo 'Hello Leader';
            }
        }else{
            $data['pesan']="Username and Password wrong!!";
            $this->load->view('login_view',$data);
        }
        
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login_view');
    }



    }

