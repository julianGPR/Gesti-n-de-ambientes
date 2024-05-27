<?php
require("Conexion/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["clave"])) {
        $clave_ingresada = $_POST["clave"];

        // Preparar la consulta SQL
        $sql = "SELECT * FROM t_usuarios WHERE Clave = ?";
        $stmt = $conexion->prepare($sql);

        // Vincular parámetros y ejecutar la consulta
        $stmt->bind_param("i", $clave_ingresada);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
            echo json_encode(["success" => false, "message" => "Error en la consulta: " . $conexion->error]);
        } else {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                session_start();
                $_SESSION['clave'] = $clave_ingresada;
                $_SESSION['rol'] = $row['Rol'];

                // Redirigir según el rol del usuario
                if ($row['Rol'] == 'Administrador') {
                    echo json_encode(["success" => true, "redirect" => "../admin/home"]);
                } elseif ($row['Rol'] == 'Instructor') {
                    echo json_encode(["success" => true, "redirect" => "../instructor/home"]);
                } else {
                    echo json_encode(["success" => false, "message" => "Rol no reconocido."]);
                }
            } else {
                echo json_encode(["success" => false, "message" => "Clave incorrecta. Inténtelo de nuevo."]);
            }
        }
    } else {
        echo json_encode(["success" => false, "message" => "Ingrese una clave"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Solicitud no válida"]);
}
?>
