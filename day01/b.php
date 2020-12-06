<?php

$data = file_get_contents('input');
$data = trim($data);
$data = explode("\n", $data);

$total = 0;
foreach ($data as $item) {
    $fuel = fuel($item);
    while ($fuel > 0) {
        $total += $fuel;
        $fuel = fuel($fuel);
    }
}

function fuel($mass) {
    return (floor($mass / 3) - 2);
}

var_dump($total);
