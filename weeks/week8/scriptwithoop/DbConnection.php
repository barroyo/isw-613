<?php

class DbConnection  {

  //DB connection info
  private $user;
  private $password;
  private $host;
  private $databaseName;
  const MYSQL_PORT = 3306;

  private $dbConnectionObject;

  public function __construct($user, $pass, $host, $database) {
    $this->user = $user;
    $this->password = $pass;
    $this->host = $host;
    $this->databaseName = $database;

    $this->dbConnectionObject = new mysqli($host.':'.self::MYSQL_PORT, $user, $pass, $database);
  }

  /**
   * Gets the existing MySQL DB Connection Object
   */
  public function getDbConnectionObject() {
    return $this->dbConnectionObject;
  }

  /**
   * Close the existing Db connection
   */
  public function closeConnection() {
    $this->dbConnectionObject->close();
  }

}