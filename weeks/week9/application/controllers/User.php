<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function register()
	{
    // $username = $this->input->get('u');
    // $password = $this->input->get('p');
    // $data['username'] = $username;
    // $data['password'] = $password;
		$this->load->view('register');
  }

	public function login()
	{
    $username = $this->input->get('u');
    $password = $this->input->get('p');
    $data['username'] = $username;
    $data['password'] = $password;
		$this->load->view('login',$data);
  }

	public function authenticate()
	{
    $this->load->model('User_model');
    // read login params (user/pass)
    $username = $this->input->post('username');
    $pass = $this->input->post('pass');

    $valid = $this->User_model->authenticate($username, $pass);

    if($valid) {
      redirect(site_url(['user','dashboard']));
    } else {
      redirect(site_url(['user','login']));
    }
  }
}
