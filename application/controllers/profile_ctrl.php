<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profile_ctrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
    }
    public function user_profile()
    {
       $data = array(
			'title' => "Profile"
		);
		$this->load->view('dist/member-profile-view', $data);
    }   
    
    public function update_profile()
    {
        $data = array(
			'title' => "Update Profile"
        );
        // $data['data'] = $this->Project_model->getbyID($id);
        $this->load->view('dist/user-profile_update', $data);
    }
    public function update_data($id)
    {
        $this->Profile_model->edit_profile($id);
        $this->session->set_flashdata('save_update', TRUE); 
        redirect('profile_ctrl/user_profile');
    }

    public function leader_profile()
    {
       $data = array(
			'title' => "Profile"
		);
		$this->load->view('dist/leader-profile-view', $data);
    }
    public function admin_profile()
    {
       $data = array(
			'title' => "Profile"
		);
		$this->load->view('dist/admin-profile-view', $data);
    }
}