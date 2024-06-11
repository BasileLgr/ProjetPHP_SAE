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

		if ($user && password_verify($password, $user['MotDePasse'])) {
			return $user;
		}
		return false;
	}

	public function create_user($data)
	{
		// Log data for debugging
		log_message('debug', 'User data to insert: ' . print_r($data, true));

		$result = $this->db->insert('login', $data);

		// Log the last query for debugging
		log_message('debug', 'SQL Query: ' . $this->db->last_query());

		if (!$result) {
			// Log any database error
			log_message('error', 'Database error: ' . print_r($this->db->error(), true));
		}

		log_message('debug', 'Insert result: ' . ($result ? 'Success' : 'Failure'));
		return $result;
	}
}
?>
