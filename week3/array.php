<?php



$a = array("uno", "dos");
//$b = ["uno", "dos"];// php 5.4
//$a[0] = "uno manual";
//$a['dos'] = "dos";

$a = array();
$a['nombre'] = 'Bladimir';
$a['apellido'] = 'Arroyo';


var_dump($a);

echo "\n";
die;

$a = array(
  "Griffin" => array('Peter','Lois','Megan'),
  "Arroyo" => array('Bladimir'),
  "Blanco" => array('Freddy', 'Erick', 'Jason')
);

array_push($a['Blanco'], 'Rudy');
var_dump($a);
echo "\n";
echo $a['Blanco'][3];
echo "\n";
?>
