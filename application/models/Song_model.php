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

	public function search_songs($search_term)
	{
		$this->db->select('song.*, album.genreId, genre.name AS genre_name, album.artistId, artist.name AS artist_name');
		$this->db->from('song');
		$this->db->join('track', 'song.id = track.songId', 'left');
		$this->db->join('album', 'track.albumId = album.id', 'left');
		$this->db->join('genre', 'album.genreId = genre.id', 'left');
		$this->db->join('artist', 'album.artistId = artist.id', 'left');
		$this->db->like('song.name', $search_term);
		$this->db->or_like('genre.name', $search_term); // Ajout de la recherche par genre
		$this->db->or_like('artist.name', $search_term); // Ajout de la recherche par artiste
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>
