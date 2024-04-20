<?php

include_once 'models/AdminModel.php';

class AdminController {
    public function home() {
        include 'views/administrador/index.php';
    }
    
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
                header("Location: ../ambientes");
                exit();
            } else {
                header("Location: index.php?error=Error al crear el ambiente");
                exit();
            }
        } else {
            include 'views/administrador/ambientes/create.php';
        }
    }

    public function updateAmbiente($id) {
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
            $result = $adminModel->modificarAmbiente($id, $nombre, $computadores, $tv, $sillas, $mesas, $tablero, $archivador, $infraestructura, $observacion);
    
            if ($result) {
                header("Location: ../ambientes");
                exit();
            } else {
                header("Location: index.php?error=Error al actualizar el ambiente&id=$id");
                exit();
            }
        } else {
            $adminModel = new AdminModel();
            $ambiente = $adminModel->obtenerAmbientePorId($id);
            include 'views/administrador/ambientes/update.php';
        }
    }

    public function inhabilitarAmbiente($id) {
        $adminModel = new AdminModel();
        $result = $adminModel->inhabilitarAmbiente($id);

        if ($result) {
            echo "<script>alert('Ambiente inhabilitado exitosamente');</script>";
        } else {
            echo "<script>alert('Error al inhabilitar el ambiente');</script>";
        }
        
        header("Location: ../ambientes");
        exit();
    }

    public function habilitarAmbiente($id) {
        $adminModel = new AdminModel();
        $result = $adminModel->habilitarAmbiente($id);
    
        if ($result) {
            echo "<script>alert('Ambiente habilitado exitosamente');</script>";
        } else {
            echo "<script>alert('Error al habilitar el ambiente');</script>";
        }
        
        header("Location: ../ambientes");
        exit();
    }
    
    public function usuarios() {
        // Lógica para manejar el apartado de usuarios
    }









    

    public function reportes() {
        // Lógica para manejar el apartado de reportes
    }
}

?>
