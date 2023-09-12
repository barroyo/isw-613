<?php 

comparison(4,"4");

function comparison($a, $b){
  echo (($a == $b) || ($a > 5))? "true\n":"false\n";  
}

function increment() {  
  $x = 10;
  callLoop(++$x);
  echo "Now x is equals to $x \n";
}

function callLoop($index){
  echo "$index \n";
}


?>
