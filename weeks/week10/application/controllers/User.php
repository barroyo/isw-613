<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  /**
   * Shows the signup page
   *
   */
	public function signup()
	{
    $this->load->view('user/signup');
  }

	public function login()
	{
    $username = $this->input->get('u');
    $password = $this->input->get('p');
    $data['username'] = $username;
    $data['password'] = $password;
		$this->load->view('user/login',$data);
  }

  /**
   * List existing users
   */
	public function list()
	{
    $data['users'] = $this->User_model->all();
    $this->load->view('user/list',$data);
  }


	public function authenticate()
	{
    // read login params (user/pass)
    $username = $this->input->post('username');
    $pass = $this->input->post('pass');

    $valid = $this->User_model->authenticate($username, $pass);

    if($valid) {
      redirect(site_url(['user','list']));
    } else {
      redirect(site_url(['user','login']));
    }
  }


  /**
   * Creates a new user
   */
  public function create(){
    // input validations (password lenght, etc)

    $result = $this->User_model->insert($this->input->post());

    if($result) {
      $this->session->set_flashdata('msg', 'User created, please login');
      redirect(site_url(['user','login']));
    } else {
      // send errors
      redirect(site_url(['user','signup']));
    }

  }
}
