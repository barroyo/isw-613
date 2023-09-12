<?php

class DbConnection {

  private $host;
  private $user;
  private $password;
  private $databaseName;
  private $activeConnection;


  function __construct($host, $user, $password, $databaseName){
    $this->host = $host;
    $this->user = $user;
    $this->password = $password;
    $this->databaseName = $databaseName;
    $this->activeConnection = new mysqli($this->host, $this->user, $this->password, $this->databaseName);
  }

  /**
   * Get an active mysql connection
   */
  function getMySQLConnection(){
    if(!$this->activeConnection) {
      $this->activeConnection = new mysqli($this->host, $this->user, $this->password, $this->databaseName);
    }
    if ($this->activeConnection->connect_errno) {
      echo "Failed to connect to MySQL: " . $this->activeConnection->connect_error;
      exit();
    }
    return $this->activeConnection;
  }
}
