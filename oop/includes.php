<?php
// recibir por parametro el nombre del archivo csv y los detalles del carro
$output_file = $argv[1];
// crear un objeto tipo Carro
$car = new Car($argv[2], $argv[3], $argv[4]);
// guardar en en un archivo la representación del objeto como csv
$file_handler = fopen($output_file, 'a');
fwrite($file_handler,$car->to_csv());
fclose($file_handler);
