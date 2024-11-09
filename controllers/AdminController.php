<?php
include_once 'models/AdminModel.php';

class AdminController {
    public function home() {
        include 'views/administrador/index.php';
    }
    public function areaTrabajo() {
        include 'views/administrador/ambientes/index.php';
    }

    public function createAreaTrabajo() {
        $adminModel = new AdminModel();
        $usuarios = $adminModel->obtenerUsuarios();
        $tiposDeArea = $adminModel->obtenerTiposDeArea();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre_area = $_POST["nombre_area"];
            $capacidad = $_POST["capacidad"];
            $ubicacion = $_POST["ubicacion"];
            $responsable = $_POST["responsable"];
            $tipo_area = $_POST["tipo_area"];
            $equipo_disponible = $_POST["equipo_disponible"];
            $estado_area = $_POST["estado_area"];
            $fecha_creacion = $_POST["fecha_creacion"];
            $comentarios = $_POST["comentarios"];

            $result = $adminModel->guardarAreaTrabajo($nombre_area, $capacidad, $ubicacion, $responsable, $tipo_area, $equipo_disponible, $estado_area, $fecha_creacion, $comentarios);

            if ($result) {
                echo "<script>alert('Área creada con éxito'); window.location.href = '../areaTrabajo';</script>";
            } else {
                echo "<script>alert('Error al crear el área'); window.history.back();</script>";
            }
        } else {
            include 'views/administrador/ambientes/create.php';
        }
    }

    public function updateAreaTrabajo($id) {
        $adminModel = new AdminModel();
        $usuarios = $adminModel->obtenerUsuarios();
        $tiposDeArea = $adminModel->obtenerTiposDeArea();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre_area = $_POST["nombre_area"];
            $capacidad = $_POST["capacidad"];
            $ubicacion = $_POST["ubicacion"];
            $responsable = $_POST["responsable"];
            $tipo_area = $_POST["tipo_area"];
            $equipo_disponible = $_POST["equipo_disponible"];
            $estado_area = $_POST["estado_area"];
            $comentarios = $_POST["comentarios"];

            $result = $adminModel->modificarAreaTrabajo($id, $nombre_area, $capacidad, $ubicacion, $responsable, $tipo_area, $equipo_disponible, $estado_area, $comentarios);

            if ($result) {
                echo "<script>alert('Área actualizada con éxito'); window.location.href = '../areaTrabajo';</script>";
            } else {
                echo "<script>alert('Error al actualizar el área'); window.history.back();</script>";
            }
        } else {
            $areaTrabajo = $adminModel->obtenerAreaTrabajoPorId($id);
            include 'views/administrador/ambientes/update.php';
        }
    }
    public function inhabilitarAreaTrabajo($id) {
        $adminModel = new AdminModel();
        $result = $adminModel->inhabilitarAreaTrabajo($id);

        if ($result) {
            echo "<script>alert('Area inhabilitada exitosamente');</script>";
        } else {
            echo "<script>alert('Error al inhabilitar el area');</script>";
        }
        
        header("Location: ../areaTrabajo");
        exit();
    }

    public function habilitarAreaTrabajo($id) {
        $adminModel = new AdminModel();
        $result = $adminModel->habilitarAreaTrabajo($id);

        if ($result) {
            echo "<script>alert('Area habilitada exitosamente');</script>";
        } else {
            echo "<script>alert('Error al habilitar el area');</script>";
        }
        
        header("Location: ../areaTrabajo");
        exit();
    }
}
?>
