<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    function __constuct()
	{
		parent::__construct();
		$this->load->database();
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
		// $query = $this->db->get();
		// return $query->row();
    }
    // function getbyID($id){
	// 	return $this->db->get_where('users',array('idUser'=>$id))->row();
	// }
}