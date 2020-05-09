<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    function __constuct()
	{
		parent::__construct();
		$this->load->database();
	}

	function select_data()
	{
		$data = [
			'level' => "A",
		];
		$result = $this->db->get_where("users", $data);
		return $result->row();
	}
	function edit_profile($id)
	{
		$data = array(
			"firstname" => $this->input->post("firstname"),
			"lastname" => $this->input->post("lastname"),
			"phone" => $this->input->post("phone"),
			"bio" => $this->input->post("bio"),
			"email" => $this->input->post("email"),
			"img" => $this->input->post("img")
		);
		$this->db->where(array('idUser'=>$id));
		$this->db->update("users", $data);
    }
    function getbyID($id)
	{
		return $this->db->get_where('users', array('idUser' => $id))->row();
	}
}