<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login_ctrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->helper('cookie');
    }

    public function index()
    {
        if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
            if ($this->Login_model->list_users($_COOKIE['email'], $_COOKIE['password'])) {
                $this->session->set_userdata(array('email' => $_COOKIE['email']));
            }
        }else {
            redirect('dist/auth_login');
        }
    }

    public function adding()
    {
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
    }

    public function register()
    {
        redirect('dist/auth_login');
    }

    public function login()
    {
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);
        $remember = $this->input->post('remember', TRUE);
        $checklogin = $this->Login_model->list_users($email, $password);
        if ($checklogin) {
            foreach ($checklogin as $row);
            if ($remember) {
                $this->session->set_userdata('remember', TRUE);
                setcookie('email', $email, time() + (86400 * 30), "/");
                setcookie('password', $password, time() + (86400 * 30), "/");
            }
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('level', $row->level);
            $this->session->set_userdata('firstname', $row->firstname);
            $this->session->set_userdata('lastname', $row->lastname);
            $this->session->set_userdata('role', $row->role);
            $this->session->set_userdata('phone', $row->phone);
            if ($this->session->userdata('level') == "A") {
                redirect('Project_ctrl/project', 'refresh');
            } elseif ($this->session->userdata('level') == "") {
                redirect('Emp_ctrl/task_emp', 'refresh');
            } elseif ($this->session->userdata('level') == "L"){
                redirect('Leader_ctrl/status', 'refresh');
            }
        } 
        else{   
            $this->session->set_flashdata('login_wrong', TRUE);
            redirect('dist/auth_login');
            }
        }  
    

    public function logout()
    {
        $this->session->sess_destroy();
        setcookie('email', '', 0, "/");
        setcookie('password', '', 0, "/");
        redirect('dist/auth_login');
    }

    // public function forgot_pass(){
    //     $this->load->view('dist/auth-forgot-password');

    // }

    public function reset_password()
    {
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $this->load->library('form_validation');
            //first check if its a valid email or not
            $this->form_validation->set_rules("email", "Email Address", "trim|required");
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('dist/auth-login', array('error' => 'Please supply a valid email address.'));
            } else {
                $email = trim($this->input->post('email'));
                $result = $this->Login_model->email_exists($email);
                if ($result) {
                    $this->send_reset_password_email($email, $result);
                    $this->load->view('dist/reset_pass_send', array('email' => $email));
                } else {
                    $this->load->view('dist/auth-forgot-password', array('error' => 'Email address not registerd with Freight Forum'));
                }
            }
        } else {
            $this->load->view('dist/auth-forgot-password');
        }
    }

    public function send_reset_password_email($email, $firstname)
    {
        $this->load->library('email');
        $email_code = md5($this->config->item('') . $firstname);
        $this->email->set_mailtype('html');
        $this->email->from($this->config->item('email'), 'Timesheet');
        $this->email->to($email);
        $this->email->subject('Please reset your pasword at Timesheet');
        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
                    "http://www.w3.org/TR/xhtml/DTD/xhtml-strict.dtd"><html>
                    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
                    </head><body>';
        $message .= '<p>Dear ' . $firstname . ',</p>';
        $message .= '<p>We want to help you reset your password! Please <strong><a href="' . base_url() . 'login_ctrl/reset_password_form/' . $email . '/' .
            $email_code . '">click here</a></strong> to reset your password.</p>';
        $message .= '<p>Thank you!</p>';
        $message .= '<p>The Team at Timesheet </p>';
        $message .= '</body></html>';
        $this->email->message($message);
        $this->email->send();
    }

    public function reset_password_form($email, $email_code)
    {
        if (isset($email_code, $email)) {
            $email = trim($email);
            $email_hash = sha1($email . $email_code);
            $verified = $this->Login_model->verify_reset_password_code($email, $email_code);
            if ($verified) {
                $this->load->view('dist/auth-reset-password', array('email_hash' => $email_hash, 'email_code' => $email_code, 'email' => $email));
            } else {
                $this->load->view('dist/auth-forgot-password', array('error' => 'There was a problem with your link. Please click it again or request
                to reset your password again', 'email' => $email));
            }
        }
    }

    public function update_password()
    {
        if (!isset($_POST['email'], $_POST['$email_hash']) || $_POST['email_hash'] !== sha1($_POST['email'] . $_POST['email_code'])) {
            die('Error updateing your password');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email_hash', 'Email Hash', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_leanght[50]|matches[password_conf]|xss_clean');
        $this->form_validation->set_rules('password', 'Confirmed Password', 'trim|required|min_length[6]|max_leanght[50]|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('dist/auth-forgot-password');
        } else {
            $result = $this->Login_model->update_password();
            if ($result) {
                $this->load->view('dist/update_pass_success');
            } else {
                $this->load->view('dist/update_pass_success', array('error' => 'Problem updating your password. Please contact' . $this->config->item('admin_email')));
            }
        }
    }

    public function reset_pass()
    {
        $email = $this->input->post('email');
        $result = $this->db->query("select * from users where email='" . $email . "'")->result_array();
        if (count($result) > 0) {
            // echo "Exit";
            $tokan = rand(1000, 9999);
            $this->db->query("update users set password='" . $tokan . "' where email='" . $email . "'");
            $message = "Please click on password reset link <br><a href='" . base_url('reset?tokan=') . "'>Reset 
            Password</a>";
            $this->email->send($email, 'Reset password link', $message);
        } else {
            // echo "Email not registered";
            $this->session->set_flashdata('un_success', TRUE);
            redirect('login_ctrl/forgot_pass');
        }
    }

    public function reset()
    {
        $tokan = $this->input->get('tokan');
        $this->load->view('dist/auth-reset-password');
    }
}
