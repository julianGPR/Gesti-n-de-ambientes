<?php
<<<<<<< HEAD
$folderPhat = $_SERVER['SCRIPT_NAME'];
$urlPhat = $_SERVER['REQUEST_URI'];
$url = substr($urlPhat, 35);
=======
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
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06

if (!defined('URL')) {
    define('URL', $url);
<<<<<<< HEAD
}
=======
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
