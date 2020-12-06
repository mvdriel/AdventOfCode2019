<?php

$data = file_get_contents('input');
$data = trim($data);
$data = explode("\n", $data);

// $data = [
//     'deal with increment 7',
//     'deal into new stack',
//     'deal into new stack'
// ];

// // $data = [
// //     'cut 6',
// //     'deal with increment 7',
// //     'deal into new stack'
// // ];

// $data = [
//     // 'deal into new stack',
//     // 'cut -4',
//     'deal with increment 3'
// ];


// $data = [
//     'cut 3'
// ];


$current = 2019;
$size = 10007;

// $size = 10;

// for ($start = 0; $start < $size; $start++) {
//     $current = $start;
    foreach ($data as $item) {
        // var_dump($current);

        $command = 'cut ';
        if (substr($item, 0, strlen($command)) === $command) {
            $position = intval(substr($item, strlen($command)));
            $current = cut($current, $position);
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
            $current = dealWithIncrement($current, $increment);
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

function dealWithIncrement($current, $increment) {
    global $size;

    return ($current * $increment) % $size;
}

function dealWithIncrementMaurits($current, $increment) {
    global $size;

    $stack = $current % $increment;
    $position = floor($current / $increment);

    $minSize = floor($size / $increment);
    for ($i = 0; $i < $stack; $i++) {
        $position += $minSize;

        if ($i < $size % $increment) {
            $position += 1;
        }
    }

    return $position;
}
