<?php
    $arrs = ['đỏ', 'xanh', 'cam', 'trắng'];
    $names = ['Anh', 'Sơn', 'Thắng', 'tôi'];
    
    $result = 'Màu';
    for ($i = 0; $i < count($arrs); $i++) {
        $result .= " {$arrs[$i]} là màu yêu thích của {$names[$i]}, ";
    }
    
    // Loại bỏ dấu phẩy cuối cùng và thêm dấu chấm
    $result = rtrim($result, ', ') . '.';
    echo $result;
    

?>