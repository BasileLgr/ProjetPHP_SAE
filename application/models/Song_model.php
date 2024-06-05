<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Song_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_songs()
	{
		$query = $this->db->get('song');
		return $query->result_array();
	}

	public function get_song($id)
	{
		$query = $this->db->get_where('song', array('id' => $id));
		return $query->row_array();
	}
}
