<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function verify_user($email, $password)
	{
		$this->db->where('Email', $email);
		$this->db->where('Mot de Passe', $password);
		$query = $this->db->get('login');
		return $query->row_array();
	}

	public function create_user($data)
	{
		return $this->db->insert('login', $data);
	}
}
