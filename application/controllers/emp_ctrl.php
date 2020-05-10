<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Emp_ctrl extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') !== 'M') {
            redirect('dist/auth_login', 'refresh');
        }
        $this->load->model('Emp_model');
    }

    public function insert_data()
    {
        $hours = $this->input->post("hours");
        $member_id = $this->session->userdata("idUser");
        $data = array(
            "project_name" => $this->input->post("project_name"),
            "task_type" => $this->input->post("task_type"),
            "des_task" => $this->input->post("des_task"),
            "hours" => $this->input->post("hours"),
            "id_user" => $member_id
        );
        if ($hours <= 8) {
            $project_name = $this->input->post("project_name");
            $this->db->where('project_name', $project_name);
            $this->db->delete('tasks');
            $this->Emp_model->insert($data);
            $this->session->set_flashdata('record_success', TRUE);
            redirect('Emp_ctrl/task_emp', 'refresh');
        } else {
            $this->session->set_flashdata('data_except', TRUE);
            redirect('Emp_ctrl/task_emp', 'refresh');
        }
    }

    public function emp_dashboard()
    {
        $data = array(
            'title' => "Dashboard Tracker"
        );
        $data['countPro'] = $this->Emp_model->getCountProjectTask();
        $data['sumJan'] = $this->Emp_model->getHoursJanuary();
        $data['sumFab'] = $this->Emp_model->getHoursFebruary();
        $data['sumMarch'] = $this->Emp_model->getHoursMarch();
        $data['sumApr'] = $this->Emp_model->getHoursApril();
        $data['sumJune'] = $this->Emp_model->getHoursJune();
        $data['sumMay'] = $this->Emp_model->getHoursMay();
        $data['sumJuly'] = $this->Emp_model->getHoursJuly();
        $data['sumAug'] = $this->Emp_model->getHoursAugust();
        $data['sumSep'] = $this->Emp_model->getHoursSeptember();
        $data['sumOct'] = $this->Emp_model->getHoursOctober();
        $data['sumNov'] = $this->Emp_model->getHoursNovember();
        $data['sumDec'] = $this->Emp_model->getHoursDecember();
        $data['sum2020'] = $this->Emp_model->getYear2020();
        $this->load->view('dist/emp-dashboard_view', $data);
        // echo '<pre>';
        // print_r ($data);
        // echo '<pre>';
        // exit();

    }
    public function chart()
    {
        $data = array(
            'title' => "Components &rsaquo; Statistic"
        );
        $this->load->view('dist/chart', $data);
    }

    public function task_emp()
    {
        $data = array(
            'title' => "Time Tracker"
        );
        $data['task_type'] = $this->Emp_model->getTaskTypes();
        $data['projectName'] = $this->Emp_model->getProjects();
        $data['module_name'] = $this->Emp_model->getModules();
        $data["select_data"] = $this->Emp_model->select_data();
        $this->load->view("dist/emp-task_view", $data);
    }

    // function time_ago($date) {
    //     $is_valid = $date;

    //     if ($is_valid) {
    //         $timestamp = strtotime($date);
    //         $difference = time() - $timestamp;
    //         $periods = array("sec", "min", "hour", "day", "week", "month", "year", "decade");
    //         $lengths = array("60", "60", "24", "7", "4.35", "12", "10");

    //         if ($difference > 0) { // this was in the past time
    //             $ending = "ago";
    //         } else { // this was in the future time
    //             $difference = -$difference;
    //             $ending = "to go";
    //         }

    //         for ($j = 0; $difference >= $lengths[$j]; $j++)
    //             $difference /= $lengths[$j];

    //         $difference = round($difference);

    //         if ($difference > 1)
    //             $periods[$j].= "s";

    //         $text = "$difference $periods[$j] $ending";

    //         return $text;
    //     } else {
    //         return 'Date Time must be in "yyyy-mm-dd hh:mm:ss" format';
    //     }
    // }
    // public function showdate($date){
    //     echo nl2br($date. ' -> ' . time_ago($date)."\n");
    // }

    public function time_ago($timestamp)
    {
        $time_ago = strtotime($timestamp);
        $current_time = time();
        $time_difference = $current_time - $time_ago;
        $seconds = $time_difference;
        $minutes    = round($seconds / 60);
        $hours      = round($seconds / 3600);
        $days       = round($seconds / 86400);
        $weeks      = round($seconds / 604800);
        $months     = round($seconds / 2629440);
        $years      = round($seconds / 31553280);

        if ($seconds <= 60) {
            return "Just Now";
        } else if ($minutes <= 60) {
            if ($minutes == 1) {
                return "one minute ago";
            } else {
                return "$minutes minute ago";
            }
        } else if ($hours <= 24) {
            if ($hours == 1) {
                return "an hour ago";
            } else {
                return "$hours hrs ago";
            }
        } else if ($days <= 7) {
            if ($days == 1) {
                return "yesterday";
            } else {
                return "$days days ago";
            }
        } else if ($weeks <= 4.3) {
            if ($weeks == 1) {
                return "a week ago";
            } else {
                return "$weeks weeks ago";
            }
        } else if ($months <= 12) {
            if ($months == 1) {
                return "a month ago";
            } else {
                return "$months months ago";
            }
        } else {
            if ($years == 1) {
                return "one year ago";
            } else {
                return "$years years ago";
            }
        }
    }
}
