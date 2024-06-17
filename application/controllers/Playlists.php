<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Playlists extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Playlist_model');
		$this->load->model('Playlist_songs_model');
		$this->load->model('Song_model');
		$this->load->library('session');
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		$data['playlists'] = $this->Playlist_model->get_playlists_by_user($user_id);
		$this->load->view('playlists/index', $data);
	}

	public function create()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header', ['title' => 'Créer une Playlist']);
			$this->load->view('library/create_playlist');
			$this->load->view('templates/footer');
		} else {
			$name = $this->input->post('name');
			$user_id = $this->session->userdata('user_id');
			$this->Playlist_model->create_playlist($name, $user_id);
			redirect('library');
		}
	}

	public function store()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'user_id' => $this->session->userdata('user_id')
		);

		$this->Playlist_model->create_playlist($data);
		redirect('playlists');
	}

	public function view($id)
	{
		$data['playlist'] = $this->Playlist_model->get_playlist($id);
		$data['songs'] = $this->Playlist_model->get_playlist_songs($id);
		$data['title'] = 'Détails de la Playlist';
		$data['user_playlists'] = $this->Playlist_model->get_playlists_by_user($this->session->userdata('user_id'));

		$this->load->view('templates/header', $data);
		$this->load->view('playlists/view', $data);
		$this->load->view('templates/footer');
	}



	public function add_song()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$playlist_id = $this->input->post('playlist_id');
		$song_id = $this->input->post('song_id');
		$this->Playlist_model->add_song_to_playlist($playlist_id, $song_id);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function remove_song($playlist_id, $song_id)
	{
		$this->Playlist_songs_model->remove_song_from_playlist($playlist_id, $song_id);
		redirect('playlists/view/' . $playlist_id);
	}

	public function duplicate($id)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$user_id = $this->session->userdata('user_id');
		$new_playlist_id = $this->Playlist_model->duplicate_playlist($id, $user_id);

		if ($new_playlist_id) {
			redirect('playlists/view/' . $new_playlist_id);
		} else {
			show_error('Erreur lors de la duplication de la playlist.');
		}
	}

	public function add_random_songs($playlist_id)
	{
		$limit = $this->input->post('song_count');
		$this->Playlist_model->add_random_songs_to_playlist($playlist_id, $limit);
		redirect('playlists/view/' . $playlist_id);
	}
}
?>
