<?php

class User_model extends CI_Model {


  /**
   *
   */
  public function authenticate($username, $password) {
    // query the database to authenticate
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $query = $this->db->get('users');
    return $query->result();

  }


  public function getAll() {
    $query = $this->db->get('users');
    return $query->result_array();
  }


  public function getById($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('users');
    return $query->row();
  }

  public function getByEmail($email) {
    $this->db->where('username', $email);
    $query = $this->db->get('users');
    return $query->row();
  }


  /**
   *  Inserts a new user in the database
   *
   * @param $user  An associative array with all user data
   */
  public function insert($user){
    $query = $this->db->insert('users', $user);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }



}