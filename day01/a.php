<?php

$data = file_get_contents('input');
$data = trim($data);
$data = explode("\n", $data);

$total = 0;
foreach ($data as $item) {
    $total += (floor($item / 3) - 2);
}

var_dump($total);
