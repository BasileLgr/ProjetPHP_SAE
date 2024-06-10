<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artist_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_artists()
	{
		$query = $this->db->get('artist');
		return $query->result_array();
	}

	public function get_artist($id)
	{
		$query = $this->db->get_where('artist', array('id' => $id));
		return $query->row_array();
	}
}
?>
