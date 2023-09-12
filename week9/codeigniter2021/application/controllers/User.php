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
		$this->load->view('login');
	}


  public function dashboard(){
    $this->load->view('dashboard');
  }

  /**
   * Method for authenticating an user
   */
	public function authenticate()
	{
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    // query the database to find a user with the username and password
    $this->load->model('User_model');
    $user = $this->User_model->authenticate($username, $password);

    if($user) {
      // show homepage
      header('location: /index.php/user/dashboard');
    } else {
      // redirect to login
      header('location: /index.php/user/login');
    }

	}
}
