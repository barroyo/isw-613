<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->load->view('student_index');
		echo "from student";
	}


	public function show($id) {
		// query the DB get student with id = $id
		
		// send data to the view
		$data["student_data"]["name"] = "Bladimir";
		$data["student_data"]["id"] = $id;
		$data["title"] = "Show Student";

		$this->load->view('student/show',$data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */