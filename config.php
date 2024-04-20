<?php
    $folderPhat = $_SERVER['SCRIPT_NAME'];
    $urlPhat = $_SERVER['REQUEST_URI'];
    $url = substr($urlPhat,35);

    define('URL', $url);
