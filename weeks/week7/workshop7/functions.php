<?php
require_once('Students.php');

$limit = $argv[1];

$students = Students::getStudents($limit);

foreach ($students as $student) {
  $newStudent = new Students($students['fullName'], $student['cedula'], $students['age'], $students['id']);
  echo $newStudent->toCsv().PHP_EOL;
}