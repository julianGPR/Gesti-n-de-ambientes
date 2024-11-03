<?php

$conexion = new mysqli("localhost", "root", "", "reportesambientes");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (!$conexion->set_charset("utf8mb4")) {
    die("Error al configurar el conjunto de caracteres: " . $conexion->error);
}
?>
