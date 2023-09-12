<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function login()
	{
		$this->load->view('user/login');
  }

  /**
   * This is the signup screen
   */
	public function signup()
	{
		$this->load->view('user/signup');
  }


  /**
   * Basic user authentication
   */
	public function authenticate()
	{
    // get the params
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    // call the authenticate function on the model
    $this->load->model('User_model');
    $result = $this->User_model->authenticate($username, $password);
    $result = $result[0];
    echo $result->username;
    // if valid user, initiliaze session and redirect to user/dashboard
    // if not valid, show error
	}
}
