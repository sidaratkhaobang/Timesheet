<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Team_ctrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Team_model');
    }

    public function team()
    {
        $data = array(
            'title' => "Create Team"
        );
        $data['user'] = $this->Team_model->getUser();
        $this->load->view('dist/admin-team_create', $data);
    }

    public function insert_data()
    {
        $data = array(
            "team_name" => $this->input->post("team_name"),
            "member" => implode(",",$this->input->post("member"))
        );
        $this->Team_model->insert($data);
        $this->session->set_flashdata('add_success', TRUE);
        redirect('team_ctrl/team', 'refresh');
    }
}
