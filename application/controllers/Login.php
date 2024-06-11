<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index()
	{
		// Si l'utilisateur est déjà connecté, redirigez-le vers le tableau de bord
		if ($this->session->userdata('user_id')) {
			redirect('dashboard');
		}
		$this->load->view('login/index');
	}

	public function authenticate()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->Login_model->verify_user($email, $password);

		if ($user) {
			// Définir les données de session et rediriger vers le tableau de bord
			$this->session->set_userdata('user_id', $user['iDCompte']);
			redirect('dashboard');
		} else {
			// Recharger la page de connexion avec un message d'erreur
			$data['error'] = 'Email ou mot de passe invalide';
			$this->load->view('login/index', $data);
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
		redirect('login');
	}
}
?>
