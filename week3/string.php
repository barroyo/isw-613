<?php 

//variables

// using single quote
$name = 'Bladimir';
// using double quote
// Recommendation: use single quote for strings
$lastname = "Arroyo";
$_test = 'test';
$TEST = 'TEST';
$test = 'test';
$age = 12;
//invalid
//$1age = 12;
//valid
$age1 = 12;

// concatenation
//echo "My name is". $name ." ".$lastname."\n";

//echo $toPrint;

// Interpolation
//echo "My name is $name $lastname \n";
//echo 'My name is $name $lastname\n';

//echo "<p>my age is: $age\n</p>";

//concatenation

echo "My name is " . $name . " " . $lastname . "\n";

//longitud de string
$lenght = strlen($name);


echo "$lenght\n";

//posicion de un string en otro string
//$pos = strpos($toPrint, $name, 12);
//echo $pos;
//echo "\n";

?>
