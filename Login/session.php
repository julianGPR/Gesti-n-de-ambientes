<?php
session_start();

function verificarSesion() {
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: index.php");
        exit();
    }
}

function obtenerNombreUsuario($conexion, $usuario_id) {
    $sql_usuario = "SELECT Nombres FROM t_usuarios WHERE Id_usuario = $usuario_id";
    $result_usuario = $conexion->query($sql_usuario);
    if ($result_usuario->num_rows > 0) {
        $row_usuario = $result_usuario->fetch_assoc();
        return $row_usuario['Nombres'];
    } else {
        return "Usuario Desconocido";
    }
}

?>
