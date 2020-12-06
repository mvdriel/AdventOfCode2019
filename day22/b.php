<?php

$data = file_get_contents('input');
$data = trim($data);
$data = explode("\n", $data);

$data = array_reverse($data);

$current = 2020;
$size = 119315717514047;

// $size = 10;

// for ($start = 0; $start < $size; $start++) {
//     $current = $start;
    foreach ($data as $item) {
        // var_dump($current);

        $command = 'cut ';
        if (substr($item, 0, strlen($command)) === $command) {
            $position = intval(substr($item, strlen($command)));
            $current = cutReverse($current, $position);
            continue;
        }

        $command = 'deal into new stack';
        if (substr($item, 0, strlen($command)) === $command) {
            $current = dealIntoNewStack($current);
            continue;
        }

        $command = 'deal with increment ';
        if (substr($item, 0, strlen($command)) === $command) {
            $increment = intval(substr($item, strlen($command)));
            $current = dealWithIncrementReverse($current, $increment);
            continue;
        }
    }
    var_dump($start . ' ==> ' . $current);
    // exit;
// }

function cut($current, $position) {
    global $size;

    if ($position < 0) {
        $position = $size + $position;
    }

    if ($current < $position) {
        return $current + $size - $position;
    }
    return $current - $position;
}

function dealIntoNewStack($current) {
    global $size;

    return $size - $current - 1;
}

function dealWithIncrementReverse($current, $increment) {
    global $size;

    while ($current % $increment > 0) {
        $current += $size;
    }

    return $current / $increment;
}
