<?php
    $arrs = ['PHP', 'HTML', 'CSS', 'JS'];
    echo '<table border="1px">';
    echo '<tr><th>Tên khóa học</th></tr>';
    foreach($arrs as $element) {
        echo '<tr><td>'.$element.'</td></tr>';
    }

?>