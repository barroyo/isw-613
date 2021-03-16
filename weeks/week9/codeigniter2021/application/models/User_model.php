<?php

class User_model extends CI_Model {


  public function authenticate($username, $password) {
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $query = $this->db->get('users');
    return $query->result();
  }

}