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
		$query = $this->db->get('login');
		$user = $query->row_array();

		if ($user && password_verify($password, $user['Mot de Passe'])) {
			return $user;
		}
		return false;
	}

	public function create_user($data)
	{
		$data['Mot de Passe'] = password_hash($data['Mot de Passe'], PASSWORD_BCRYPT);
		return $this->db->insert('login', $data);
	}
}
?>