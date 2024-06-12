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
		$query = $this->input->get('q');
		$data['albums'] = $this->Album_model->search_albums($query);
		$data['artists'] = $this->Artist_model->search_artists($query);
		$data['songs'] = $this->Song_model->search_songs($query);

		$this->load->view('search/results', $data);
	}
}
?>
