<?php

    echo "Script Greet.php".PHP_EOL;
    print_r($argv);
    echo "Cantidad de parámetros: $argc".PHP_EOL;

    foreach ($argv as $key => $value) {
      echo "Parámetro $key: $value".PHP_EOL;
    }
