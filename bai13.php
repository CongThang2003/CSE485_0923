<?php
    $numbers = [78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 
    65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73];
    echo "Trung bình cộng các số là: ";
    $tb = array_sum($numbers) / count($numbers);
    echo "$tb <br/>";
    echo "Các số lớn hơn giá trị trung bình là: ";
    $max = '';
    $min = '';
    foreach($numbers as $element) {
        if($element > $tb) {
            $max = $max . $element . " ";
        } else {
            $min = $min . $element . " ";
        }
    }
    echo "$max <br/>";
    echo "Các số nhỏ hơn giá trị trung bình là: ";
    echo "$min <br/>";



?>