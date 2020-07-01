<?php
$x = 5; // global scope

function myTest()
{
    $y = 10; // local scope
    global $x;
    $x = 20;
    echo "Test variables inside the function:\n";
    echo "Variable x is: $x\n";
    echo "Variable y is: $y\n";
    echo "****end of myTest**** \n";
} 

echo "Test variables outside the function:\n";
echo "Variable x is: $x\n";

myTest();

echo "Test variables outside the function:\n";
echo "Variable x is: $x\n";
//echo "Variable y is: $y";
?>
