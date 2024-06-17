<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Playlist_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_playlists_by_user($user_id)
	{
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('playlists');
		return $query->result_array();
	}

	public function get_playlist($playlist_id)
	{
		$this->db->where('id', $playlist_id);
		$query = $this->db->get('playlists');
		return $query->row_array();
	}

	public function get_songs_by_playlist($playlist_id)
	{
		$this->db->select('song.*');
		$this->db->from('playlist_songs');
		$this->db->join('song', 'playlist_songs.song_id = song.id');
		$this->db->where('playlist_songs.playlist_id', $playlist_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_playlist_songs($playlist_id)
	{
		$this->db->select('song.*');
		$this->db->from('playlist_songs');
		$this->db->join('song', 'playlist_songs.song_id = song.id');
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

	public function create_playlist($user_id, $name)
	{
		$data = array(
			'user_id' => $user_id,
			'name' => $name
		);
		return $this->db->insert('playlists', $data);
	}

	public function delete_playlist($playlist_id)
	{
		$this->db->where('id', $playlist_id);
		$this->db->delete('playlists');

		// Supprimer également les entrées associées dans playlist_songs
		$this->db->where('playlist_id', $playlist_id);
		$this->db->delete('playlist_songs');
	}

	public function remove_song_from_playlist($playlist_id, $song_id)
	{
		$this->db->where('playlist_id', $playlist_id);
		$this->db->where('song_id', $song_id);
		$this->db->delete('playlist_songs');
	}
}
?>
