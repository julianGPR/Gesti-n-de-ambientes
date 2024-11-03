<?php
require_once 'models/ReporteModel.php';

class ReporteController {
    private $reporteModel;

    public function __construct() {
        $this->reporteModel = new ReporteModel();
    }

    public function reportes() {
        include 'views/administrador/reportes/index.php';
    }
    public function verReporteAdministrador($tipo_area) {
        $reporteModel = new ReporteModel();
        $reportes = $reporteModel->obtenerReportePorTipoArea($tipo_area);
        include 'views/administrador/reportes/repoA.php'; // Cambia esto a tu vista correspondiente.
    }

    public function createReporte() {
        session_start(); // Asegura que la sesión está iniciada para acceder a $_SESSION['Id_usuario']
        
        $areas = $this->reporteModel->obtenerAreas();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_area = $_POST["id_area"];
            $fechaHora = date('Y-m-d H:i:s'); // Fecha y hora actual
            $id_usuario = $_SESSION['Id_usuario'];
            $estado = $_POST["estado"];
            $estado_reporte = $_POST["estado_reporte"];
            $fecha_solucion = $_POST["fecha_solucion"];
            $observaciones = $_POST["observaciones"];

            try {
                $result = $this->reporteModel->guardarReporte($id_area, $fechaHora, $id_usuario, $estado, $estado_reporte, $fecha_solucion, $observaciones);

                if ($result) {
                    header("Location: ../reporte/verReportesPorUsuario");
                    exit();
                } else {
                    echo "Error al crear el reporte.";
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            include 'views/encargado/reportes/create.php';
        }
    }

    public function verReportesPorUsuario() {
        session_start();
        $id_usuario = $_SESSION['Id_usuario'];
        $reportes = $this->reporteModel->obtenerReportesPorUsuario($id_usuario);
        include 'views/encargado/reportes/index.php';
    }
}
?>