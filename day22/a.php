<?php

$input = trim(file_get_contents('input'));
$lines = explode("\n", $input);

$current = 2019;
$size = 10007;

foreach ($lines as $line) {
    $command = 'cut ';
    if (substr($line, 0, strlen($command)) === $command) {
        $position = intval(substr($line, strlen($command)));
        $current = cut($current, $position);
        continue;
    }

    $command = 'deal into new stack';
    if (substr($line, 0, strlen($command)) === $command) {
        $current = dealIntoNewStack($current);
        continue;
    }

    $command = 'deal with increment ';
    if (substr($line, 0, strlen($command)) === $command) {
        $increment = intval(substr($line, strlen($command)));
        $current = dealWithIncrement($current, $increment);
        continue;
    }
}

var_dump($current);

function cut($current, $position) {
    global $size;

    if ($position < 0) {
        $position = $size + $position;
    }

    if ($current < $position) {
        $current += $size;
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
