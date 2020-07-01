<?php

$sum = function($a, $b){
  return $a + $b;
};

$substract = function($a, $b) {
  return $a - $b;
};


function calculator($v1, $v2, $operation){
  $result = $operation($v1, $v2);
  echo $result;
}


echo calculator(20, 30, $sum);
echo calculator(20, 30, $substract);