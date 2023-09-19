<?php
    $a = [
        'a' => [
        'b' => 0,
        'c' => 1
        ],
        'b' => [
        'e' => 2,
        'o' => [
        'b' => 3
        ]
        ]
    ];
    foreach($a as $b => $c) {
        foreach($c as $d => $e) {
            if($d = 'c') {
                if($e != 1) {
                    echo $e;
                }
            }
            foreach($e as $f => $g) {
                if($f =  'b') {
                    echo $g;
                }
            }
        }
    }

?>