<?php

include_once 'models/AdminModel.php';

class AdminController {
    public function home() {
        include 'views/administrador/index.php'; // Incluir la vista del index del administrador
    }
    
    // APARTADO DE AMBIENTES!!!
    public function ambientes() {
        include 'views/administrador/ambientes/index.php';
    }

    public function createAmbiente() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $computadores = $_POST["computadores"];
            $tv = $_POST["tv"];
            $sillas = $_POST["sillas"];
            $mesas = $_POST["mesas"];
            $tablero = $_POST["tablero"];
            $archivador = $_POST["archivador"];
            $infraestructura = $_POST["infraestructura"];
            $observacion = $_POST["observacion"];

            $adminModel = new AdminModel();
            $result = $adminModel->guardarAmbiente($nombre, $computadores, $tv, $sillas, $mesas, $tablero, $archivador, $infraestructura, $observacion);

            if ($result) {
                echo "<script>alert('Ambiente creado exitosamente');</script>";
                include 'views/administrador/ambientes/index.php';
                exit();
            } else {
                header("Location: index.php?error=Error al crear el ambiente"); // Redirigir al index con mensaje de error
                exit();
            }
        } else {
            include 'views/administrador/ambientes/create.php'; // Mostrar el formulario de creación de ambiente
        }
        
    }
    
    // APARTADO DE USUARIOS!!!
    public function usuarios() {
        // Agrega la lógica para manejar el apartado de usuarios
    }

    
    
    // APARTADO DE REPORTES!!!
    public function reportes() {
        // Agrega la lógica para manejar el apartado de reportes
    }
}

?>
