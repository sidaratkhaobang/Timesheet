<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    function __constuct()
	{
		parent::__construct();
		$this->load->database();
	}
	function select_data_e()
	{
		$member_id = $this->session->userdata("idUser");
		$data = [
			'idUser' => $member_id,
		];
		$result = $this->db->get_where("users", $data);
		return $result->row();
	}
	function getRole()
	{
		$this->db->order_by('NameRole', 'ASC');
		$query = $this->db->get('roles');
		return $query->result();
	}
	function select_data_l()
	{
		$data = [
			'level' => "L",
		];
		$result = $this->db->get_where("users", $data);
		return $result->row();
	}
	function select_data_a()
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
			"role" => $this->input->post("role"),
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