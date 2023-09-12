<?php

require_once('DbConnection.php');

// get db params from the shell
$dbUser = $argv[1];
$dbPass = $argv[2];
$dbHost = $argv[3];
$dbDb = $argv[4];
$tableName = $argv[5];
$fileName = $argv[6];

// instance the database connection
$dbConnection = new DbConnection($dbUser, $dbPass, $dbHost, $dbDb);

//// for each result instance the object and save to csv file
$sql = "SELECT * FROM $tableName";
$result = $dbConnection->getDbConnectionObject()->query($sql);
$items = $result->fetch_all();

$fp = fopen($fileName, 'w');
foreach ($items as $item) {
  //save into the csv file
  fputcsv($fp, $item);
}
fclose($fp);

$dbConnection->closeConnection();