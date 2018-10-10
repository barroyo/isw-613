<?php

    $dbServer = "localhost";
    $dbUserName = "php_web";
    $dbPassword = "php_web";
    $dbName = "php_web";
    $dbPort = 3306;

    $connection = new mysqli($dbServer, $dbUserName, $dbPassword, $dbName, $dbPort);
    //print_r($connection);

    if($connection->connect_errno)
    {
        echo "Error: $connection->connect_error\n";
        exit;
    }

    $sql = "SELECT full_name, document FROM students";
    $resultObj = $connection->query($sql);
    if ($resultObj->num_rows > 0)
    {
      while($row = $resultObj->fetch_array())
      {
        echo "Student:".$row['full_name'].PHP_EOL;
      }
    }
    $connection->close();
