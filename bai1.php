<?php
    function tinhTong($mang) {
        $tong = 0;
        foreach ($mang as $phanTu) {
            $tong += $phanTu;
        }
        return $tong;
    }

    function tinhTich($mang) {
        $tich = 1;
        foreach ($mang as $phanTu) {
            $tich *= $phanTu;
        }
        return $tich;
    }

    function tinhHieu($mang) {
        $hieu = $mang[0];
        for ($i = 1; $i < count($mang); $i++) {
            $hieu -= $mang[$i];
        }
        return $hieu;
    }

    function tinhThuong($mang) {
        $thuong = $mang[0];
        for ($i = 1; $i < count($mang); $i++) {
            $thuong /= $mang[$i];
        }
        return $thuong;
    }

    $myArray = [2, 5, 6, 9, 2, 5, 6, 12, 5];

    $tong = tinhTong($myArray);
    $tich = tinhTich($myArray);
    $hieu = tinhHieu($myArray);
    $thuong = tinhThuong($myArray);

    echo "Tổng các phần tử = " . implode(' + ', $myArray) . " = $tong <br />";
    echo "Tích các phần tử = " . implode(' * ', $myArray) . " = $tich <br />";
    echo "Hiệu các phần tử = " . implode(' - ', $myArray) . " = $hieu <br />";
    echo "Thương các phần tử = " . implode(' / ', $myArray) . " = $thuong <br />";

?>