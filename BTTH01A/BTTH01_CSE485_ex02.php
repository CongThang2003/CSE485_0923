<?php
    $arrs = ['đỏ', 'xanh', 'cam', 'trắng'];
    $names = ['Anh', 'Sơn', 'Thắng', 'tôi'];
    
    $result = 'Màu';
    for ($i = 0; $i < count($arrs); $i++) {
        $result .= " {$arrs[$i]} là màu yêu thích của {$names[$i]}, ";
    }
    $result = rtrim($result, ', ') . '.';
    echo $result;
?>
