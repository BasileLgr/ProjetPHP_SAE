<?php
class Playlist_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function create_playlist($data)
	{
		return $this->db->insert('playlists', $data);
	}

	public function get_playlists_by_user($user_id)
	{
		$query = $this->db->get_where('playlists', array('user_id' => $user_id));
		return $query->num_rows() > 0 ? $query->result_array() : [];
	}

	public function get_playlist($id)
	{
		$query = $this->db->get_where('playlists', array('id' => $id));
		return $query->row_array();
	}
}
?>
