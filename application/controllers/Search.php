<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Album_model');
		$this->load->model('Artist_model');
		$this->load->model('Song_model');
	}

	public function index()
	{
		$search_term = $this->input->get('q');

		// Rechercher les albums, artistes et chansons
		$data['albums'] = $this->Album_model->search_albums($search_term);
		$data['artists'] = $this->Artist_model->search_artists($search_term);
		$data['songs'] = $this->Song_model->search_songs($search_term);

		// Si le terme de recherche correspond à un genre, rechercher les albums et chansons associés
		$genre_results = $this->Album_model->search_genres($search_term);
		if (!empty($genre_results)) {
			$data['albums'] = array_merge($data['albums'], $genre_results['albums']);
			$data['songs'] = array_merge($data['songs'], $genre_results['songs']);
		}

		$this->load->view('search/results', $data);
	}
}
?>
