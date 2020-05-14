<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profile_ctrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
    }
    // public function user_profile()
    // {
    //    $data = array(
    // 		'title' => "Profile"
    //     );
    // 	$this->load->view('dist/member-profile-view', $data);
    // }   

    public function update_profile_admin($id)
    {
        $data = array(
            'title' => "Update Profile"
        );
        $data['role'] = $this->Profile_model->getRole();
        $data['data'] = $this->Profile_model->getbyID($id);
        $this->load->view('dist/admin-edit_profile', $data);
    }
    public function update_data_admin($id)
    {
        $this->Profile_model->edit_profile($id);
        $this->session->set_flashdata('save_update', TRUE);
        redirect('profile_ctrl/admin_profile');
    }
    public function admin_profile()
    {
        $data = array(
            'title' => "Profile"
        );
        $data["data"] = $this->Profile_model->select_data_a();
        $this->load->view('dist/admin-profile-view', $data);
    }

    //leader-edit_prrofile
    public function update_profile_leader($id)
    {
        $data = array(
            'title' => "Update Profile"
        );
        $data['role'] = $this->Profile_model->getRole();
        $data['data'] = $this->Profile_model->getbyID($id);
        $this->load->view('dist/leader-edit_profile', $data);
    }
    public function update_data_leader($id)
    {
        $this->Profile_model->edit_profile($id);
        $this->session->set_flashdata('save_update', TRUE);
        redirect('profile_ctrl/leader_profile');
    }
    public function leader_profile()
    {
        $data = array(
            'title' => "Profile"
        );
        $data["data"] = $this->Profile_model->select_data_l();
        $this->load->view('dist/leader-profile_view', $data);
    }

    //emp-edit_prrofile
    public function update_profile_emp($id)
    {
        $data = array(
            'title' => "Update Profile"
        );
        $data['role'] = $this->Profile_model->getRole();
        $data['data'] = $this->Profile_model->getbyID($id);
        $this->load->view('dist/emp-edit_profile', $data);
    }
    public function update_data_emp($id)
    {
        $this->Profile_model->edit_profile($id);
        $this->session->set_flashdata('save_update', TRUE);
        redirect('profile_ctrl/emp_profile');
    }
    public function emp_profile()
    {
        $data = array(
            'title' => "Profile"
        );
        $data["data"] = $this->Profile_model->select_data_e();
        $this->load->view('dist/emp-profile_view', $data);
    }
}
