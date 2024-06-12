<?php
class Playlist_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_user_playlists($user_id)
	{
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('playlists');
		return $query->result_array();
	}

	public function create_playlist($data)
	{
		return $this->db->insert('playlists', $data);
	}

	public function delete_playlist($playlist_id, $user_id)
	{
		$this->db->where('id', $playlist_id);
		$this->db->where('user_id', $user_id);
		return $this->db->delete('playlists');
	}

	public function get_playlist_songs($playlist_id)
	{
		$this->db->select('songs.*');
		$this->db->from('playlist_songs');
		$this->db->join('songs', 'playlist_songs.song_id = songs.id');
		$this->db->where('playlist_songs.playlist_id', $playlist_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function add_song_to_playlist($playlist_id, $song_id)
	{
		$data = array(
			'playlist_id' => $playlist_id,
			'song_id' => $song_id
		);
		return $this->db->insert('playlist_songs', $data);
	}

	public function remove_song_from_playlist($playlist_id, $song_id)
	{
		$this->db->where('playlist_id', $playlist_id);
		$this->db->where('song_id', $song_id);
		return $this->db->delete('playlist_songs');
	}
}
?>
