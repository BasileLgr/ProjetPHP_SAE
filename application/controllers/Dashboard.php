<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		if (!$this->session->userdata('user_id')) {
			redirect('login');
		}
	}

	public function index()
	{
		$data['user'] = $this->User_model->get_user($this->session->userdata('user_id'));
		$this->load->view('dashboard/index', $data);
	}

	public function update_profile()
	{
		$data['user'] = $this->User_model->get_user($this->session->userdata('user_id'));

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('pseudo', 'Pseudo', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('dashboard/update_profile', $data);
		} else {
			$update_data = array(
				'Email' => $this->input->post('email'),
				'Pseudo' => $this->input->post('pseudo')
			);
			$this->User_model->update_user($this->session->userdata('user_id'), $update_data);
			redirect('dashboard');
		}
	}

	public function change_password()
	{
		$this->form_validation->set_rules('old_password', 'Ancien mot de passe', 'required');
		$this->form_validation->set_rules('new_password', 'Nouveau mot de passe', 'required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Confirmation mot de passe', 'required|matches[new_password]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('dashboard/change_password');
		} else {
			$user = $this->User_model->get_user($this->session->userdata('user_id'));
			if (password_verify($this->input->post('old_password'), $user['MotDePasse'])) {
				$this->User_model->change_password($this->session->userdata('user_id'), $this->input->post('new_password'));
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('error', 'L\'ancien mot de passe est incorrect.');
				$this->load->view('dashboard/change_password');
			}
		}
	}

	public function delete_account()
	{
		$this->User_model->delete_user($this->session->userdata('user_id'));
		$this->session->sess_destroy();
		redirect('login');
	}
}
?>
