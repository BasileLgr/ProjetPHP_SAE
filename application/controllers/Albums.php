<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Albums extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Album_model');
	}

	public function index()
	{
		$data['albums'] = $this->Album_model->get_albums();
		$this->load->view('albums/index', $data);
	}

	public function view($id)
	{
		$data['album'] = $this->Album_model->get_album($id);
		if (empty($data['album'])) {
			show_404();
		}
		$this->load->view('albums/view', $data);
	}
}
?>