<?php
require('DatabaseConnection.php');

class Student {

  /**
   *
   */
  function getAll($limit = 10) {
    $connectionObject = new DatabaseConnection();

    $conn = $connectionObject->getConnection();

    $sql = "SELECT * FROM students LIMIT $limit";
    $resultObj = $conn->query($sql);
    $results = [];
    if ($resultObj->num_rows > 0)
    {
      while($row = $resultObj->fetch_array())
      {
        array_push($results, $row);
      }
    }
    $conn->close();
    return $results;
  }

}
