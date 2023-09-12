<?php

if($argc <= 1){
  echo "Missing parameters".PHP_EOL;
  exit(1);
}

$file = $argv[1];
$table = $argv[2];

echo "Inserting data from $file to $table table".PHP_EOL;

// open file
$handler = fopen($file, "r");
// read csv
$data = fgetcsv($handler);
// generate the insert sql statement

$sql = "INSERT INTO $table VALUES ()";
$result = mysqli_query($connection, $sql);

// close file
fclose($handler);
