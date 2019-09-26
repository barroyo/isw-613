<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Session extends CI_Controller {

	public function login() {
		$data['title'] = "Please login to Webmail";
		$this->load->view('session/login_ajax', $data);
	}

	public function authenticate() {
		// get username and password
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		// load the model and call the authenticate method
		$this->load->model('Session_model');
		$result = $this->Session_model->user_authenticate($username, $password);

		sleep(2);
		// return
		if ($result && sizeof($result) > 0 ) {
			$userData = $result[0];
			//redirect a dashboard
			// redirect(base_url('dashboard'));
			header('Content-Type: application/json');
    	echo json_encode( array('status' => 'valid', 'message' => 'User is valid', 'firstname' => $userData['fullname']) );
		} else {
			//cargar login con error
			header('Content-Type: application/json');
    	echo json_encode( array('status' => 'invalid', 'message' => 'User is invalid') );
		}
	}

}