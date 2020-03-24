<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function login()
	{
    // params
		// load data
		$this->load->view('common/head');
		$this->load->view('user/login');
		$this->load->view('common/footer');

	}

	public function logout()
	{
		$this->session->sess_destroy();
    $this->session->set_flashdata('error', 'Inicie sesión nuevamente');
		redirect(site_url(['user','login']));
	}

	/**
	 * Loads the user's dashboard
	 */
	public function dashboard()
	{
		if($this->session->has_userdata('user')){
			$this->load->view('common/head');
			$this->load->view('common/navbar');
			$this->load->view('user/dashboard');
			$this->load->view('common/footer');
		} else {
			$this->session->set_flashdata('error', 'No ha iniciado sesión');
			redirect(site_url(['user','login']));
		}
  }

	public function register()
	{
		$this->load->view('user/register');
	}

	public function save()
	{
		$validation_errors = [];

		if(!$this->input-post('name')){
			$validation_errors['name'] = 'is blank';
		}
		if(!$this->input-post('username')){
			$validation_errors['username'] = 'is blank';
		}

		if(sizeof($validation_errors) > 0) {
			$this->session->set_flashdata('validation_errors', $validation_errors);
			redirect(site_url(['user','register']));
		}
	}

	public function search($name = ''){
		$data['users'] = $this->user_model->getByName($name);
		$this->load->view('user/list', $data);
	}

	public function list()
	{
		$data['users'] = $this->user_model->all();
		$data['usersQty'] = sizeof($data['users']);
		$this->load->view('user/list', $data);
	}

	/**
	 * Authenticates a user
	 */
	public function authenticate()
	{
		// get username and password
		$pass = $this->input->post('password');
		$user = $this->input->post('username');

		// check the database with that information
		$authUser = $this->user_model->authenticate($user, $pass);
		// return error or redirect to landing page
		if ($authUser) {
			$this->session->set_userdata('user', $authUser);
			redirect(site_url(['user','dashboard']));
		} else {
			$this->session->set_flashdata('error', 'Invalid username or password');
			redirect(site_url(['user','login']));
		}
	}
}
