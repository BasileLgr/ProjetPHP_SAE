<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_albums()
	{
		$this->db->select('album.*, artist.name as artist_name, genre.name as genre_name, cover.jpeg as cover_image');
		$this->db->from('album');
		$this->db->join('artist', 'album.artistId = artist.id', 'left');
		$this->db->join('genre', 'album.genreId = genre.id', 'left');
		$this->db->join('cover', 'album.coverId = cover.id', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_album($id)
	{
		$this->db->select('album.*, artist.name as artist_name, genre.name as genre_name, cover.jpeg as cover_image');
		$this->db->from('album');
		$this->db->join('artist', 'album.artistId = artist.id', 'left');
		$this->db->join('genre', 'album.genreId = genre.id', 'left');
		$this->db->join('cover', 'album.coverId = cover.id', 'left');
		$this->db->where('album.id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function search_albums($search_term)
	{
		$this->db->select('album.*, artist.name as artist_name, genre.name as genre_name, cover.jpeg as cover_image');
		$this->db->from('album');
		$this->db->join('artist', 'album.artistId = artist.id', 'left');
		$this->db->join('genre', 'album.genreId = genre.id', 'left');
		$this->db->join('cover', 'album.coverId = cover.id', 'left');
		$this->db->like('album.name', $search_term);
		$this->db->or_like('artist.name', $search_term);
		$this->db->or_like('genre.name', $search_term);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function search_genres($search_term)
	{
		// Recherche des albums par genre
		$this->db->select('album.*, artist.name as artist_name, genre.name as genre_name, cover.jpeg as cover_image');
		$this->db->from('album');
		$this->db->join('artist', 'album.artistId = artist.id', 'left');
		$this->db->join('genre', 'album.genreId = genre.id', 'left');
		$this->db->join('cover', 'album.coverId = cover.id', 'left');
		$this->db->like('genre.name', $search_term);
		$query = $this->db->get();
		$albums = $query->result_array();

		// Recherche des chansons par genre
		$this->db->select('song.*, album.genreId, genre.name AS genre_name, album.artistId, artist.name AS artist_name');
		$this->db->from('song');
		$this->db->join('track', 'song.id = track.songId', 'left');
		$this->db->join('album', 'track.albumId = album.id', 'left');
		$this->db->join('genre', 'album.genreId = genre.id', 'left');
		$this->db->join('artist', 'album.artistId = artist.id', 'left');
		$this->db->like('genre.name', $search_term);
		$query = $this->db->get();
		$songs = $query->result_array();

		return ['albums' => $albums, 'songs' => $songs];
	}
}
?>
