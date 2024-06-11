<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('login/index');
	}

	public function authenticate()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Mot de passe', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('login/index');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user = $this->Login_model->verify_user($email, $password);

			if ($user) {
				$this->session->set_userdata([
					'user_id' => $user['iDCompte'],
					'user_name' => $user['Pseudo'],
					'user_email' => $user['Email']
				]);
				redirect('dashboard');
			} else {
				$data['error'] = 'Email ou mot de passe incorrect';
				$this->load->view('login/index', $data);
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata(['user_id', 'user_name', 'user_email']);
		$this->session->sess_destroy();
		redirect('login');
	}
}
?>
