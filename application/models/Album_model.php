<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_albums()
	{
		$query = $this->db->get('album');
		return $query->result_array();
	}

	public function get_album($id)
	{
		$query = $this->db->get_where('album', array('id' => $id));
		return $query->row_array();
	}
}
?>
