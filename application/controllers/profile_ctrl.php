<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profile_ctrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
    }
    public function edit_profile($id)
    {
        $data = array(
			'title' => "Edit Profile"
        );
        $data['data'] = $this->Profile_model->getbyID($id);
        $this->load->view('dist/edit-profile', $data);
    }
    public function update_profile($id)
    {
        $this->Profile_model->update_profile($id);
        $this->session->set_flashdata('save_update', TRUE);
        redirect('profile_ctrl/edit_profile', 'refresh');
    }
}