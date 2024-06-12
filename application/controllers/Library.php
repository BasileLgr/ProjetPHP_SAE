<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Playlist_model');
		$this->load->library('session');
	}

	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
			$this->session->set_userdata('redirect_url', current_url());
			redirect('login');
		}

		$user_id = $this->session->userdata('user_id');
		$data['playlists'] = $this->Playlist_model->get_user_playlists($user_id);
		$data['title'] = 'Ma Librairie';

		$this->load->view('templates/header', $data);
		$this->load->view('library/index', $data);
		$this->load->view('templates/footer');
	}

	public function create_playlist()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$this->form_validation->set_rules('name', 'Nom de la Playlist', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->index();
		} else {
			$data = array(
				'name' => $this->input->post('name'),
				'user_id' => $this->session->userdata('user_id')
			);
			$this->Playlist_model->create_playlist($data);
			redirect('library');
		}
	}

	public function delete_playlist($playlist_id)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$user_id = $this->session->userdata('user_id');
		$this->Playlist_model->delete_playlist($playlist_id, $user_id);
		redirect('library');
	}

	public function view_playlist($playlist_id)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$data['songs'] = $this->Playlist_model->get_playlist_songs($playlist_id);
		$data['title'] = 'Détails de la Playlist';

		$this->load->view('templates/header', $data);
		$this->load->view('library/view_playlist', $data);
		$this->load->view('templates/footer');
	}
}
?>
