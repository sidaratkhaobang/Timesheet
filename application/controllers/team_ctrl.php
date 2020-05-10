<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Team_ctrl extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level') == "A") {
            redirect('dist/auth_login', 'refresh');
        }
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
        $query = $this->db->get('teams');
        $num = $query->num_rows();
        if ($num > 0) {
            $this->session->set_flashdata('data_duplicate', TRUE);
            redirect('team_ctrl/team', 'refresh');
        } else {
            $data = array(
                "team_name" => $this->input->post("team_name"),
                "member" => implode(",", $this->input->post("member"))
            );
            $this->Team_model->insert($data);
            $this->session->set_flashdata('add_success', TRUE);
            redirect('team_ctrl/team', 'refresh');
        }
    }

    public function dataTeam(){
        $data = array(
            'title' => "Team"
        );
        $data['data_team'] = $this->Team_model->getdata();
        $this->load->view('dist/admin-team-view', $data);
    }
}
