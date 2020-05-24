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

    public function form_team()
    {
        $data = array(
            'title' => "Create Team"
        );
        $data['user'] = $this->Team_model->getUser();
        $this->load->view('dist/admin-team_create', $data);
    }

    public function insert_data()
    {
        $team_name = $this->input->post("team_name");
        $this->db->select('team_name');
        $this->db->where('team_name', $team_name);
        $query = $this->db->get('teams');
        $num = $query->num_rows();
        if ($num > 0) {
            $this->session->set_flashdata('data_duplicate', TRUE);
            redirect('team_ctrl/dataTeam', 'refresh');
        } else {
        $data = array(
            "team_name" => $this->input->post("team_name"),
            "member" => implode(",", $this->input->post("member"))
        );
        $this->Team_model->insert($data);
        $this->session->set_flashdata('add_success', TRUE);
        redirect('team_ctrl/dataTeam', 'refresh');
        }
    }

    public function dataTeam()
    {
        $data = array(
            'title' => "Team"
        );
        $data['data_team'] = $this->Team_model->getdata();
        $this->load->view('dist/admin-team-view', $data);
    }

    public function update_team($id)
    {
        $data = array(
            'title' => "Update Team"
        );
        $data['user'] = $this->Team_model->getUser();
        $data['data'] = $this->Team_model->getbyID($id);
        $this->load->view('dist/admin-team-update', $data);
    }

    public function update_data($id)
    {
        $this->Team_model->update($id);
        $this->session->set_flashdata('save_update', TRUE);
        redirect('team_ctrl/dataTeam', 'refresh');
    }

    function delete()
    {
        $id = $this->input->post('delete_id', TRUE);
        $this->Team_model->delete_package($id);
        redirect('team_ctrl/dataTeam');
    }
}
