<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Song_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_songs()
	{
		$this->db->select('song.*, album.genreId, genre.name AS genre_name, album.artistId, artist.name AS artist_name');
		$this->db->from('song');
		$this->db->join('track', 'song.id = track.songId', 'left');
		$this->db->join('album', 'track.albumId = album.id', 'left');
		$this->db->join('genre', 'album.genreId = genre.id', 'left');
		$this->db->join('artist', 'album.artistId = artist.id', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_song($id)
	{
		$this->db->select('song.*, album.genreId, genre.name AS genre_name, album.artistId, artist.name AS artist_name');
		$this->db->from('song');
		$this->db->join('track', 'song.id = track.songId', 'left');
		$this->db->join('album', 'track.albumId = album.id', 'left');
		$this->db->join('genre', 'album.genreId = genre.id', 'left');
		$this->db->join('artist', 'album.artistId = artist.id', 'left');
		$this->db->where('song.id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function search_songs($query)
	{
		$this->db->select('song.*, album.name as album_name, artist.name as artist_name');
		$this->db->from('song');
		$this->db->join('track', 'track.songId = song.id', 'left');
		$this->db->join('album', 'track.albumId = album.id', 'left');
		$this->db->join('artist', 'album.artistId = artist.id', 'left');
		$this->db->like('song.name', $query);
		$this->db->or_like('album.name', $query);
		$this->db->or_like('artist.name', $query);
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>
