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
}
?>
