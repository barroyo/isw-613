<?php 

//variables
$age = 20;

echo $age;
echo "\n";

$age = "Now age is an string\n";
echo $age;

test("Valor que yo quiera 2");

function test($var1, $var2 = null){
  echo $var1;
  echo "\n";
}

test("Valor que yo quiera");
?>
