<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function login()
	{
		$this->load->view('user/login');
  }

	public function authenticate()
	{
    echo "here is where we get the post data and do the auth";
		// $this->load->view('user/login');
	}
}
