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
		$this->load->view('users/login');
	}

	/**
	 * /user/edit/id
	 */
	public function edit($id)
	{
		$data['user'] = $this->User_model->getById($id);
		$this->load->view('users/edit', $data);

	}

	public function show($firstName, $lastName) {
		echo "$firstName - $lastName";
	}

	public function add()
	{
		$this->load->view('users/insert');
	}

	/**
	 * Show the user dashboard
	 *
	 */
	public function dashboard(){
		$users = $this->User_model->getAll();
		$data['users'] = $users;
		$data['title'] = 'There are '.sizeof($users).' users';
		$this->load->view('users/dashboard', $data);
	}


	/**
	 *
	 */
	public function authenticate(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->User_model->authenticate($username, $password);

		if($user){
			redirect('user/dashboard');
		} else {
			redirect('user/login');
		}

	}

	/**
	 *
	 */
	public function validateEmail($emailAddress){
		$user = $this->User_model->getByEmail($emailAddress);
		if($user){
			echo json_encode(["status" => true]);
		} else {
			echo json_encode(["status" => false]);
		}
	}

	/**
   * Creates a new user
   */
  public function insert(){
    // input validations (password lenght, etc)
		$user = $this->input->post();
		$result = $this->User_model->insert($user);

    if($result) {
      $this->session->set_flashdata('msg', 'User created');
      redirect(site_url(['user','dashboard']));
    } else {
      // send errors
			$this->session->set_flashdata('msg', 'There was an error');
      redirect(site_url(['user','dashboard']));
    }

  }
}
