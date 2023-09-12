<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  /**
   *  Validate in the database that the user exists
   *
   * @param $username  The username
   * @param $password The user's password
   */
  public function authenticate($username, $password){
      $query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
      if ($query->result()) {
        return $query->result()[0];
      } else {
        return false;
      }
  }


  /**
   *  Validate in the database that the user exists
   *
   * @param $username  The username
   * @param $password The user's password
   */
  public function getByName($name){
      $query = $this->db->get_where('users', array('name' => $name));
      if ($query->result()) {
        return $query->result();
      } else {
        return false;
      }
  }

  /**
   *  Get user by Id
   *
   * @param $id  The user's id
   */
  public function findById($id){
      $query = $this->db->get_where('users', array('id' => $id));
      if ($query->result()) {
        return $query->result();
      } else {
        return false;
      }
  }

  /**
   *  Get all users from the databas
   *
   */
  public function all(){
      $query = $this->db->get('users');
      return $query->result();
  }


  /**
   *  Inserts a new user in the database
   *
   * @param $user  An associative array with all user data
   */
  public function insert($user){
    $this->db->insert('users', $user);

    $userId = $this->db->insert_id();
    if ($userId) {
      return $userId;
    } else {
      return false;
    }
}

}