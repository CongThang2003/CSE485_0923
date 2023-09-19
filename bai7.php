<?php
    $array = [12, 5, 200, 10, 125, 60, 90, 345, -123, 100, -125, 0];
    foreach($array as $element) {
        if($element % 5 === 0 && ($element >= 100 && $element <= 200)) {
            echo "$element <br />";
        }
    }

?>