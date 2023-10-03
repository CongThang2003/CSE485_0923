<?php

require_once('../app/config/config.php');

$controller = $_GET['c'] ? $_GET['c'] : 'home';
$action = $_GET['a'] ? $_GET['a'] : 'index';

$controller = ucfirst($controller) . 'Controller';
$pathcontroller = APP_ROOT . '/app/controllers/' . $controller . '.php';

if (!file_exists($pathcontroller)) {
    die("Đường dẫn không tồn tại!");
}

include_once($pathcontroller);

$mycontroller = new $controller();

$mycontroller->$action();
