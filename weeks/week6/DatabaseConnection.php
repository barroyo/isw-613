<?php

class DatabaseConnection {
  public $dbServer = "localhost";
  public $dbUserName = "root";
  public $dbPassword = "root1234";
  public $dbName = "php_web2";
  public $dbPort = 3306;

  public function getConnection() {
    $connection = new mysqli($this->dbServer, $this->dbUserName, $this->dbPassword, $this->dbName, $this->dbPort);
    if($connection->connect_errno) {
        echo "Error: $connection->connect_error\n";
        exit;
    }
    return $connection;
  }

}
