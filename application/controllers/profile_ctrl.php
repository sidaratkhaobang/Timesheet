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
    
    public function update_profile($id)
    {
        $data = array(
			'title' => "Update Profile"
        );
        $data['data'] = $this->Profile_model->getbyID($id);
        $this->load->view('dist/admin-edit_profile', $data);
    }
    public function update_data($id)
    {
        $this->Profile_model->edit_profile($id);
        $this->session->set_flashdata('save_update', TRUE); 
        redirect('profile_ctrl/admin_profile');
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
        $data["data"] = $this->Profile_model->select_data();
		$this->load->view('dist/admin-profile-view', $data);
    }
}