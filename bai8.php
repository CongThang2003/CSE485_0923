<?php
    $array = ['programming', 'php', 'basic', 'dev', 'is', 'program is PHP'];
    $max = 0;
    $min = 0;
    $stringmax = "";
    $stringmin = "";
    foreach($array as $element) {
        if($max < strlen($element)) {
            $max = strlen($element);
            $stringmax = $element;
        } else if($min > strlen($element)) {
            $min = strlen($element);
            $stringmin = $element;
        }
    }
    echo "Chuỗi lớn nhất là " . $stringmax . ", độ dài = " . $max . "<br/>";
    echo "Chuỗi nhỏ nhất là " . $stringmin . ", độ dài = " . $min . "<br/>";
?>