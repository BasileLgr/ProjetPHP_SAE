<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artists extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Artist_model');
	}

	public function index()
	{
		$data['artists'] = $this->Artist_model->get_artists();
		$this->load->view('artists/index', $data);
	}

	public function view($id)
	{
		$data['artist'] = $this->Artist_model->get_artist($id);
		$this->load->view('artists/view', $data);
	}
}
