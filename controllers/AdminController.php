<?php
include_once 'models/AdminModel.php';

class AdminController {
    public function home() {
        $adminModel = new AdminModel();
    
        $data = [
            'totalFacturas' => $adminModel->obtenerNumeroTotalFacturas(),
            'facturacionTotal' => $adminModel->obtenerFacturacionTotal(),
            'facturacionPromedio' => $adminModel->obtenerFacturacionPromedioPorCliente(),
            'facturasPorMes' => $adminModel->obtenerFacturasPorMes(),
            'productosMasVendidos' => $adminModel->obtenerProductosVendidos(),
        ];

        include 'views/administrador/index.php';
    }

    public function areaTrabajo() {
        $adminModel = new AdminModel();
        $areas = $adminModel->obtenerAreasDeTrabajo();
        include 'views/administrador/ambientes/index.php';
    }

    public function createAreaTrabajo() {
        session_start(); // Iniciar sesión para manejar notificaciones
        $adminModel = new AdminModel();
        $usuarios = $adminModel->obtenerUsuarios();
        $tiposDeArea = $adminModel->obtenerTiposDeArea();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre_area = $_POST["nombre_area"];
            $capacidad = $_POST["capacidad"];
            $ubicacion = $_POST["ubicacion"];
            $responsable = $_POST["responsable"];
            $tipo_area  = $_POST["tipo_area"];
            $equipo_disponible = $_POST["equipo_disponible"];
            $estado_area = $_POST["estado_area"];
            $fecha_creacion = $_POST["fecha_creacion"];
            $comentarios = $_POST["comentarios"];

            $result = $adminModel->guardarAreaTrabajo($nombre_area, $capacidad, $ubicacion, $responsable, $tipo_area, $equipo_disponible, $estado_area, $fecha_creacion, $comentarios);

            if ($result) {
                $_SESSION['mensaje'] = "Área creada con éxito.";
                $_SESSION['tipo_mensaje'] = "success";
                header("Location: ../areaTrabajo");
                exit();
            } else {
                $_SESSION['mensaje'] = "Error al crear el área.";
                $_SESSION['tipo_mensaje'] = "danger";
                header("Location: index.php?action=createAreaTrabajo");
                exit();
            }
        } else {
            include 'views/administrador/ambientes/create.php';
        }
    }

    public function updateAreaTrabajo($id) {
        session_start();
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
                $_SESSION['mensaje'] = "Área actualizada con éxito.";
                $_SESSION['tipo_mensaje'] = "success";
                header("Location: ../areaTrabajo");
                exit();
            } else {
                $_SESSION['mensaje'] = "Error al actualizar el área.";
                $_SESSION['tipo_mensaje'] = "danger";
                header("Location: index.php?action=updateAreaTrabajo&id=$id");
                exit();
            }
        } else {
            $areaTrabajo = $adminModel->obtenerAreaTrabajoPorId($id);
            include 'views/administrador/ambientes/update.php';
        }
    }

    public function inhabilitarAreaTrabajo($id) {
        session_start();
        $adminModel = new AdminModel();
        $result = $adminModel->inhabilitarAreaTrabajo($id);

        if ($result) {
            $_SESSION['mensaje'] = "Área inhabilitada con éxito.";
            $_SESSION['tipo_mensaje'] = "success";
        } else {
            $_SESSION['mensaje'] = "Error al inhabilitar el área.";
            $_SESSION['tipo_mensaje'] = "danger";
        }

        header("Location: ../areaTrabajo");
        exit();
    }

    public function habilitarAreaTrabajo($id) {
        session_start();
        $adminModel = new AdminModel();
        $result = $adminModel->habilitarAreaTrabajo($id);

        if ($result) {
            $_SESSION['mensaje'] = "Área habilitada con éxito.";
            $_SESSION['tipo_mensaje'] = "success";
        } else {
            $_SESSION['mensaje'] = "Error al habilitar el área.";
            $_SESSION['tipo_mensaje'] = "danger";
        }

        header("Location: ../areaTrabajo");
        exit();
    }
}
?>
