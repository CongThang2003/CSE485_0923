<?php
    $arr =  ['a', 'b', 'ABC'];

    for($i = 0; $i < count($arr); $i++) {
        $arr[$i] = strtolower($arr[$i]);
    }

    print_r($arr);

?>