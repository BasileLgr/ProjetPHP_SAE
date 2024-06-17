<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artists extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Artist_model');
		$this->load->model('Album_model');
		$this->load->model('Song_model');
	}

	public function view($id)
	{
		$data['artist'] = $this->Artist_model->get_artist($id);
		$data['albums'] = $this->Album_model->get_albums_by_artist($id);
		$data['songs'] = $this->Song_model->get_songs_by_artist($id);

		$this->load->view('templates/header', $data);
		$this->load->view('artists/index', $data); // Appeler la vue index.php
		$this->load->view('templates/footer');
	}


	public function list()
	{
		$sort = $this->input->get('sort');
		$order = $this->input->get('order') ?: 'ASC';
		$data['artists'] = $this->Artist_model->get_artists_sorted($sort, $order);
		$this->load->view('artists/list', $data);
	}
}
?>
