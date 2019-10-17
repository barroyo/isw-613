<?php

    $dbServer = "localhost";
    $dbUserName = "root";
    $dbPassword = "root1234";
    $dbName = "php_web2";
    $dbPort = 3306;

    $connection = new mysqli($dbServer, $dbUserName, $dbPassword, $dbName, $dbPort);
    //print_r($connection);

    if($connection->connect_errno)
    {
        echo "Error: $connection->connect_error\n";
        exit;
    }

    $sql = "SELECT * FROM students";
    $resultObj = $connection->query($sql);
    if ($resultObj->num_rows > 0)
    {
      while($row = $resultObj->fetch_array())
      {
        echo "Student:".$row['full_name'].PHP_EOL;
      }
    }
    $connection->close();
