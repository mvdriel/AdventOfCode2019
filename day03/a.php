<?php
$data = file_get_contents('input');
$data = "R75,D30,R83,U83,L12,D49,R71,U7,L72\nU62,R66,U55,R34,D71,R55,D58,R83";

$data = trim($data);
$data = explode("\n", $data);

$matrix = [];
$shortest = null;
foreach ($data as $i => $wire) {
    $cx = $cy = 0;
    $wire = explode(',', $wire);
    foreach ($wire as $section) {
        $lengthx = $lengthy = 1;
        $dx = $dy = 1;

        $direction = $section[0];
        $length = substr($section, 1);

        if (in_array($direction, ['L', 'D'])) {
            $length = -$length;
        }

        if (in_array($direction, ['L', 'R'])) {
            $lengthx = $length;
        }

        if (in_array($direction, ['D', 'U'])) {
            $lengthy = $length;
        }

        if ($direction === 'L') {
            $dx = -1;
        }
        if ($direction === 'D') {
            $dy = -1;
        }

        for ($x = 0; $x < $lengthx; $x += $dx) {
            for ($y = 0; $y < $lengthy; $y += $dy) {
                if ($i > 1 && ($matrix[$cx + $x][$cy + $y] ?? 0 === 1)) {
                    $distance = $cx + $x + $cy + $y;
                    if ($shortest === null || $distance < $shortest) {
                        $shortest = $distance;
                    }
                }

                $matrix[$cx + $x][$cy + $y] = $i;
            }
        }
    }
}

function p($m) {
    foreach ()

}

var_dump($shortest);
