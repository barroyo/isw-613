<?php
class User_model extends CI_Model {

  public function authenticate($username, $password)
  {
    $query = $this->db->get_where('users',
    array('username' => $username, 'password' => $password));
    return $query->result_object();

  }

}


