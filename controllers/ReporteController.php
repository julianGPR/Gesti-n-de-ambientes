<?php
require_once 'models/ReporteModel.php';
date_default_timezone_set('America/Bogota');

class ReporteController {
    private $reporteModel;

    public function __construct() {
        $this->reporteModel = new ReporteModel();
    }

    public function reportes() {
        session_start();
        include 'views/administrador/reportes/index.php';
    }

    public function verReporteAdministrador($tipo_area) {
        session_start();
        $reportes = $this->reporteModel->obtenerReportePorTipoArea($tipo_area);

        if (empty($reportes)) {
            $_SESSION['mensaje'] = "No hay reportes disponibles para el área seleccionada.";
            $_SESSION['tipo_mensaje'] = "info";
        }

        include 'views/administrador/reportes/repoA.php';
    }

    public function createReporte() {
        session_start();

        $areas = $this->reporteModel->obtenerAreas();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_area = $_POST["id_area"];
            $fechaHora = !empty($_POST["FechaHora"]) ? $_POST["FechaHora"] : date('Y-m-d H:i:s');
            $id_usuario = $_SESSION['Id_usuario'];
            $estado = 1;
            $estado_reporte = 1;
            $fecha_solucion = null;
            $observaciones = $_POST["observaciones"];

            try {
                $result = $this->reporteModel->guardarReporte($id_area, $fechaHora, $id_usuario, $estado, $estado_reporte, $fecha_solucion, $observaciones);

                if ($result) {
                    $_SESSION['mensaje'] = "Reporte creado con éxito.";
                    $_SESSION['tipo_mensaje'] = "success";
                    header("Location: ../reporte/verReportesPorUsuario/");
                    exit();
                } else {
                    $_SESSION['mensaje'] = "Error al crear el reporte.";
                    $_SESSION['tipo_mensaje'] = "danger";
                }
            } catch (Exception $e) {
                $_SESSION['mensaje'] = "Error: " . $e->getMessage();
                $_SESSION['tipo_mensaje'] = "danger";
            }
        } else {
            include 'views/encargado/reportes/create.php';
        }
    }

    public function verReportesPorUsuario() {
        session_start();
        $id_usuario = $_SESSION['Id_usuario'];
        $reportes = $this->reporteModel->obtenerReportesPorUsuario($id_usuario);

        if (empty($reportes)) {
            $_SESSION['mensaje'] = "No hay reportes creados por este usuario.";
            $_SESSION['tipo_mensaje'] = "info";
        }

        include 'views/encargado/reportes/index.php';
    }

    public function actualizarEstadoReporte() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_reporte = $_POST['id_reporte'] ?? null;
            $estado_reporte = $_POST['estado_reporte'] ?? null;
            $fecha_solucion = null;

            if ($estado_reporte == '2') {
                $fecha_solucion = date('Y-m-d H:i:s');
            }

            try {
                $result = $this->reporteModel->actualizarEstadoReporte($id_reporte, $estado_reporte, $fecha_solucion);

                if ($result) {
                    $_SESSION['mensaje'] = "Estado del reporte actualizado con éxito.";
                    $_SESSION['tipo_mensaje'] = "success";
                    echo json_encode(['success' => true, 'fecha_solucion' => $fecha_solucion]);
                } else {
                    $_SESSION['mensaje'] = "No se pudo actualizar el estado del reporte.";
                    $_SESSION['tipo_mensaje'] = "danger";
                    echo json_encode(['success' => false, 'error' => 'No se pudo actualizar el reporte.']);
                }
            } catch (Exception $e) {
                $_SESSION['mensaje'] = "Error: " . $e->getMessage();
                $_SESSION['tipo_mensaje'] = "danger";
                echo json_encode(['success' => false, 'error' => $e->getMessage()]);
            }
        } else {
            $_SESSION['mensaje'] = "Método de solicitud no permitido.";
            $_SESSION['tipo_mensaje'] = "warning";
            echo json_encode(['success' => false, 'error' => 'Método de solicitud no permitido.']);
        }
    }
}
