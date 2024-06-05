<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Genres extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Genre_model');
	}

	public function index()
	{
		$data['genres'] = $this->Genre_model->get_genres();
		$this->load->view('genres/index', $data);
	}

	public function view($id)
	{
		$data['genre'] = $this->Genre_model->get_genre($id);
		$this->load->view('genres/view', $data);
	}
}
