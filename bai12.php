<?php
    $numbers = [
        'key1' => 12, 
        'key2' => 30, 
        'key3' => 4, 
        'key4' => -123, 
        'key5' => 1234, 
        'key6' => -12565, 
    ];

    $begin = reset($numbers);
    $end = end($numbers);
    $max = max($numbers);
    $min = min($numbers);
    $sum = array_sum($numbers);
    sort($numbers);
    echo "Phần tử đầu tiên: " . $begin . "<br/>";
    echo "Phần tử cuối cùng: " . $end . "<br/>";
    echo "Phần tử lớn nhất: " . $max . "<br/>";
    echo "Phần tử nhỏ nhất: " . $min . "<br/>";
    echo "Tổng giá trị các phần tử: " . $sum . "<br/>";
    echo "Sắp xếp mảng theo thứ tự tăng dần theo giá trị: ";
    foreach($numbers as $element) {
        echo "$element ";
    }
    echo "<br/>";
    rsort($numbers);
    echo "Sắp xếp mảng theo thứ tự giảm dần theo giá trị: ";
    foreach($numbers as $element) {
        echo "$element ";
    }
    echo "<br/>";
    ksort($numbers);
    echo "Sắp xếp mảng theo thứ tự tăng dần theo key: ";
    foreach($numbers as $element) {
        echo "$element ";
    }
    echo "<br/>";   
    krsort($numbers);
    echo "Sắp xếp mảng theo thứ tự giảm dần theo key: ";
    foreach($numbers as $element) {
        echo "$element ";
    }
?>