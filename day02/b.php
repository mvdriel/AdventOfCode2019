<?php

foreach (range(0, 99) as $noun) {
    foreach (range(0, 99) as $verb) {
        $halt = false;
        $data = file_get_contents('input');
        $data = trim($data);

        $data = explode(',', $data);
        $data[1] = $noun;
        $data[2] = $verb;

        $position = 0;
        while(!$halt) {
            $opcode = intval($data[$position]);
            switch($opcode) {
                case 1: // add
                    $data[$data[$position + 3]] = $data[$data[$position + 1]] + $data[$data[$position + 2]];
                    break;
                case 2: // mul
                    $data[$data[$position + 3]] = $data[$data[$position + 1]] * $data[$data[$position + 2]];
                    break;
                case 99:
                    $halt = true;
                    if ($data[0] === 19690720) {
                        var_dump(100 * $noun + $verb);
                        exit;
                    }
            }

            $position += 4;
        }
    }
}
