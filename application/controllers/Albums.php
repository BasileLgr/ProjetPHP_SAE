<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Albums extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Album_model');
		$this->load->model('Song_model');
		$this->load->model('Genre_model');
	}

	public function index()
	{
		$sort = $this->input->get('sort');
		$order = $this->input->get('order') ?: 'ASC';
		$data['albums'] = $this->Album_model->get_albums_sorted($sort, $order);
		$this->load->view('albums/list', $data);
	}

	public function view($id)
	{
		$data['album'] = $this->Album_model->get_album($id);
		if (empty($data['album'])) {
			show_404();
		}
		$data['songs'] = $this->Song_model->get_songs_by_album($id);
		$this->load->view('albums/index', $data);  // Load the index.php view
	}

	public function list()
	{
		$data['title'] = "Liste des Albums";
		$data['genres'] = $this->Genre_model->get_genres();

		$sort_by = $this->input->get('sort_by') ?? 'name';
		$order = $this->input->get('order') ?? 'asc';
		$selected_genres = $this->input->get('genres') ?? [];

		$data['albums'] = $this->Album_model->get_albums_by_genres($selected_genres, $sort_by, $order);
		$data['sort_by'] = $sort_by;
		$data['order'] = $order;
		$data['selected_genres'] = $selected_genres;

		$this->load->view('templates/header', $data);
		$this->load->view('albums/list', $data);
		$this->load->view('templates/footer');
	}
}
?>
