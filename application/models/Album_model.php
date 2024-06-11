<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_albums()
	{
		$this->db->select('album.*, cover.jpeg as cover_image');
		$this->db->from('album');
		$this->db->join('cover', 'album.coverId = cover.id', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_album($id)
	{
		$this->db->select('album.*, cover.jpeg as cover_image');
		$this->db->from('album');
		$this->db->join('cover', 'album.coverId = cover.id', 'left');
		$this->db->where('album.id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
}
?>
