<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    function __constuct()
	{
		parent::__construct();
		$this->load->database();
    }
function update_profile($id)
	{
		$data = array(
			"firstname" => $this->input->post("firstname"),
			"lastname" => $this->input->post("lastname"),
			"phone" => $this->input->post("phone"),
			"role" => $this->input->post("role"),
			"email" => $this->input->post("email")
		);
		$this->db->where(array('idUser'=>$id));
		$this->db->update("users", $data);
    }
    function getbyID($id){
		return $this->db->get_where('users',array('idUser'=>$id))->row();
	}
}