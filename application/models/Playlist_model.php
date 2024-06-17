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
		$this->db->select('song.*, artist.name as artist_name');
		$this->db->from('playlist_songs');
		$this->db->join('song', 'playlist_songs.song_id = song.id');
		$this->db->join('track', 'song.id = track.songId', 'left');
		$this->db->join('album', 'track.albumId = album.id', 'left');
		$this->db->join('artist', 'album.artistId = artist.id', 'left');
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

	public function create_playlist($name, $user_id)
	{
		$data = array(
			'name' => $name,
			'user_id' => $user_id
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

	public function get_user_playlists($user_id)
	{
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('playlists');
		return $query->result_array();
	}

	public function duplicate_playlist($playlist_id, $user_id)
	{
		// Duplicate playlist
		$this->db->select('*');
		$this->db->from('playlists');
		$this->db->where('id', $playlist_id);
		$query = $this->db->get();
		$playlist = $query->row_array();

		if ($playlist) {
			$new_playlist_data = array(
				'name' => $playlist['name'] . ' (Copie)',
				'user_id' => $user_id
			);
			$this->db->insert('playlists', $new_playlist_data);
			$new_playlist_id = $this->db->insert_id();

			// Duplicate songs in playlist
			$this->db->select('*');
			$this->db->from('playlist_songs');
			$this->db->where('playlist_id', $playlist_id);
			$query = $this->db->get();
			$songs = $query->result_array();

			foreach ($songs as $song) {
				$new_song_data = array(
					'playlist_id' => $new_playlist_id,
					'song_id' => $song['song_id']
				);
				$this->db->insert('playlist_songs', $new_song_data);
			}

			return $new_playlist_id;
		}

		return false;
	}
}
?>
