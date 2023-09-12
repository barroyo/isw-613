<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function register()
	{
    // $username = $this->input->get('u');
    // $password = $this->input->get('p');
    // $data['username'] = $username;
    // $data['password'] = $password;
		$this->load->view('users/register');
  }

	public function login()
	{
    $username = $this->input->get('u');
    $password = $this->input->get('p');
    $data['usuario'] = $username;
    $data['password'] = $password;
		$this->load->view('users/login',$data);
  }

  /**
   * List all active users from the database
   */
  public function list(){
    $this->load->model('User_model');
    $data['users'] = $this->User_model->all();
    $this->load->view('users/list',$data);
  }

  /**
   * View one specific user
   */
  public function show($id, $type){
    if ($type === 'email') {

    } else {

    }
    $this->load->model('User_model');
    $results = $this->User_model->findById($id);
    if($results){
      $data['user'] = $results[0];
      $this->load->view('users/view',$data);
    } else {
      //generate a 404 error or redirect with message
      $this->session->set_flashdata('error', 'The user ID does not exist');
      redirect(site_url(['user','list']));
    }
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

	public function create()
	{
    $this->load->model('User_model');

    $userData = [];
    $userData['name'] = $this->input->post('firstname');
    $userData['lastname'] = $this->input->post('lastname');
    $userData['username'] = $this->input->post('username');
    $userData['password'] = $this->input->post('password');

    $userId = $this->User_model->insert($userData);

    if($userId) {
      redirect(site_url(['user','list']));
    } else {
      //there was an error creating the user
    }
  }
}
