<?php
<<<<<<< HEAD
$folderPhat = $_SERVER['SCRIPT_NAME'];
$urlPhat = $_SERVER['REQUEST_URI'];
$url = substr($urlPhat, 35);

if (!defined('URL')) {
    define('URL', $url);
}
=======
    $folderPhat = $_SERVER['SCRIPT_NAME'];
    $urlPhat = $_SERVER['REQUEST_URI'];
    $url = substr($urlPhat,35);

    define('URL', $url);
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
