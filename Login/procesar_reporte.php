<?php
require("Conexion/conexion.php");

// Verificar si el usuario ha iniciado sesión
session_start();
if (!isset($_SESSION['usuario_id'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al inicio de sesión
    header("Location: index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["observaciones"])) {
        $observaciones = $_POST["observaciones"];

  
        $fechaHora = date('Y-m-d H:i:s');


        $usuario_id = $_SESSION['usuario_id'];


        $sql_insert_reporte = "INSERT INTO t_reportes (FechaHora, Id_usuario, Id_ambiente, Estado, Observaciones) 
                               VALUES (?, ?, ?, 0, ?)";
        $stmt_insert_reporte = $conexion->prepare($sql_insert_reporte);
        
        
        $id_ambiente = 1; // aqu se asume que el reporte es para el primer ambiente, entonces esto toca cambiarlo para que sea el ambiente segun el codigo

        
        $stmt_insert_reporte->bind_param("siis", $fechaHora, $usuario_id, $id_ambiente, $observaciones);

   
        if ($stmt_insert_reporte->execute()) {
            
            header("Location: vista_instructor.php");
            exit();
        } else {
            echo "Error al enviar el reporte: " . $conexion->error;
        }
        $stmt_insert_reporte->close();
    }
}

$conexion->close();
?>
