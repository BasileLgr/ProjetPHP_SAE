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
		$data['title'] = 'Recherche';
		$this->load->view('templates/header', $data);
		$this->load->view('search/index');
		$this->load->view('templates/footer');
	}

	public function results()
	{
		$query = $this->input->get('q');

		$data['title'] = 'Résultats de recherche pour "' . htmlspecialchars($query) . '"';
		$data['albums'] = $this->Album_model->search_albums($query);
		$data['artists'] = $this->Artist_model->search_artists($query);
		$data['songs'] = $this->Song_model->search_songs($query);

		$this->load->view('templates/header', $data);
		$this->load->view('search/results', $data);
		$this->load->view('templates/footer');
	}
}
?>
