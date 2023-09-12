<?php

require('Student.php');

$student = new Student();
if($argc == 2 ) {
  $allStudents = $student->getAll($argv[1]);
} else {
  $allStudents = $student->getAll();
  // // echo "Wrong number of parameters";
  // die;
}

var_dump($allStudents);
// loop and print





