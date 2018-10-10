<?php

$a = array('uno', 'dos', 'tres');


$b = array(
  "name" => 'Blaidmir',
  "last_name" => 'Arroyo',
  "email" => "bladimir.ab@gmail.com",
);


foreach($a as $item) {
  echo $item . "\n";
}


foreach($b as $i=>$item) {
  echo $i . '= '. $item . "\n";
}


?>
