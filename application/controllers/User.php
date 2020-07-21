<?php


class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		// Validate the form
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == true) {
			$identity = $this->input->post('email');
			$password = $this->input->post('password');
			$remember_me = FALSE;
			if (($this->input->post("remember"))) {
				$remember_me = TRUE;
			}
			if ($this->ion_auth->login($identity, $password, $remember_me) == TRUE) {
				redirect(site_url('home'));
			} else {
				$this->session->set_flashdata('errors', 'We cannot log you in.');
				redirect(site_url('/'));
			}
		} else {
			$this->session->set_flashdata('errors', validation_errors());
			redirect(site_url('/'));
		}
	}

	public function logout()
	{
		$this->ion_auth->logout();
		redirect(site_url('/'));
	}

	public function register()
	{
		$this->load->view('login/register');
	}

	public function register_user()
	{

		$this->form_validation->set_rules('name', 'Email', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[c_password]');
		$this->form_validation->set_rules('c_password', 'Confirm Password', 'trim|required');
		if ($this->form_validation->run() == true) {

			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$username = $email;

			$email = $this->input->post('email');
			$additional_data = [];

			$group = array('1'); // Sets user to admin.

			$this->ion_auth->register($username, $password, $email, $additional_data, $group);
			$this->session->set_flashdata('success', "Registration Success");

		} else {
			$this->session->set_flashdata('errors', validation_errors());
		}
		redirect(site_url('/register'));
	}
}
