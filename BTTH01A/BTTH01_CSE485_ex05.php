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
    $result = $a['b']['o']['b'];
    $result1 = $a['a']['c'];
    echo "$result  <br />";
    echo "$result1 <br />";
    foreach($a as $b => $c){
        foreach($c as $d => $e) {
            if($b == 'a') {
                echo "$e ";
            }
        }
    }
?>