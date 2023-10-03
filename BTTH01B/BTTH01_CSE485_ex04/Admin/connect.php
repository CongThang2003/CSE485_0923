<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=btth01_cse485;charset=utf8", 'root', '123');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Failed".$e->getMessage();
}
?>