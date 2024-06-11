<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_albums()
	{
		$this->db->select('album.*, cover.jpeg AS cover_image, genre.name AS genre_name');
		$this->db->from('album');
		$this->db->join('cover', 'album.coverId = cover.id', 'left');
		$this->db->join('genre', 'album.genreId = genre.id', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_album($id)
	{
		$this->db->select('album.*, cover.jpeg AS cover_image, genre.name AS genre_name');
		$this->db->from('album');
		$this->db->join('cover', 'album.coverId = cover.id', 'left');
		$this->db->join('genre', 'album.genreId = genre.id', 'left');
		$this->db->where('album.id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function search_albums($search_term)
	{
		$this->db->select('album.*, cover.jpeg AS cover_image, genre.name AS genre_name');
		$this->db->from('album');
		$this->db->join('cover', 'album.coverId = cover.id', 'left');
		$this->db->join('genre', 'album.genreId = genre.id', 'left');
		$this->db->like('album.name', $search_term);
		$this->db->or_like('genre.name', $search_term);  // Ajout de la recherche par genre
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>
