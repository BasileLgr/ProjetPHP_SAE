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
		$this->load->view('login/index');
	}

	public function authenticate()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->Login_model->verify_user($email, $password);

		if ($user) {
			$this->session->set_userdata('user_id', $user['iDCompte']);
			$this->session->set_userdata('username', $user['Pseudo']);
			$this->session->set_userdata('logged_in', true);
			redirect('dashboard');
		} else {
			$this->session->set_flashdata('error', 'Invalid email or password');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('logged_in');
		redirect('login');
	}
}
?>
