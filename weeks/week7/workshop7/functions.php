<?php
require_once('StudentDao.php');
require_once('Students.php');

$limit = $argv[1];

$students = StudentDao::getAll($limit);

foreach ($students as $student) {
  $newStudent = new Students($student['fullName'], $student['cedula'], $student['age'], $student['id']);
  echo $newStudent->toCsv().PHP_EOL;
}