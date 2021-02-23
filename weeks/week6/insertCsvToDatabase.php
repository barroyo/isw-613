<?php

if($argc <= 1){
  echo "Missing parameters";
  exit(1);
}

$file = $argv[1];
$table = $argv[2];

echo "Inserting data from $file to $table table".PHP_EOL;

$headers = true;
if (($handle = fopen($file, "r")) !== FALSE) {
  while (($data = fgetcsv($handle)) !== FALSE) {
    if($headers) {
      $headersString = "`{$data[0]}`, `{$data[1]}`, `{$data[2]}`";
      $headers = false;
    }
    $sql = "INSERT INTO $table ($headersString) VALUES (`{$data[0]}`, `{$data[1]}`, `{$data[2]}`)".PHP_EOL;

    echo $sql;
  }
  fclose($handle);
}