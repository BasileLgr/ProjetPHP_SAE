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
		$data['songs'] = $this->Playlist_songs_model->get_songs_in_playlist($id);
		$this->load->view('playlists/view', $data);
	}

	public function add_song()
	{
		$playlist_id = $this->input->post('playlist_id');
		$song_id = $this->input->post('song_id');
		$this->Playlist_songs_model->add_song_to_playlist($playlist_id, $song_id);
		redirect('playlists/view/' . $playlist_id);
	}

	public function remove_song($playlist_id, $song_id)
	{
		$this->Playlist_songs_model->remove_song_from_playlist($playlist_id, $song_id);
		redirect('playlists/view/' . $playlist_id);
	}
}
?>
