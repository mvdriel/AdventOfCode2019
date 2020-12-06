<?php

$input = trim(file_get_contents('input'));
$lines = explode("\n", $input);

$total = 0;
foreach ($lines as $line) {
    $fuel = fuel($line);
    while ($fuel > 0) {
        $total += $fuel;
        $fuel = fuel($fuel);
    }
}

function fuel($mass) {
    return (floor($mass / 3) - 2);
}

var_dump($total);
