<?php

require('Student.php');


$s = new Student('Bladimir','Arroyo', 20, '20013274');
echo $s->toString();

// Test Private
// $s->internalId = '456';
// $s->setInternalId('456');
echo $s->toString();
