<?php

$input = trim(file_get_contents('input'));
$lines = explode("\n", $input);

$total = 0;
foreach ($lines as $line) {
    $total += (floor($line / 3) - 2);
}

var_dump($total);
