<?php

$data = file_get_contents('input');
$data = trim($data);

$data = explode(',', $data);
$data[1] = 12;
$data[2] = 2;

$position = 0;
while(true) {
    $opcode = intval($data[$position]);
    switch($opcode) {
        case 1: // add
            $data[$data[$position + 3]] = $data[$data[$position + 1]] + $data[$data[$position + 2]];
            break;
        case 2: // mul
            $data[$data[$position + 3]] = $data[$data[$position + 1]] * $data[$data[$position + 2]];
            break;
        case 99:
            var_dump($data[0]);
            exit;
    }

    $position += 4;
}
