<?php
require_once 'models/ReporteModel.php';
date_default_timezone_set('America/Bogota'); // Ajusta a la zona horaria correcta


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
        include 'views/administrador/reportes/repoA.php';
    }

    public function createReporte() {
        session_start();
        
        $areas = $this->reporteModel->obtenerAreas();
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_area = $_POST["id_area"];
            $fechaHora = !empty($_POST["FechaHora"]) ? $_POST["FechaHora"] : date('Y-m-d H:i:s'); // Usar fecha actual si no se proporciona
            $id_usuario = $_SESSION['Id_usuario'];
            
            // Valores predeterminados para Estado y Estado Reporte
            $estado = 1; // Asignar 1 automáticamente
            $estado_reporte = 1; // Asignar 1 automáticamente
            $fecha_solucion = null; // Inicialmente vacío hasta que el administrador apruebe el reporte
            $observaciones = $_POST["observaciones"];
    
            try {
                $result = $this->reporteModel->guardarReporte($id_area, $fechaHora, $id_usuario, $estado, $estado_reporte, $fecha_solucion, $observaciones);
    
                if ($result) {
                    header("Location: ../reporte/verReportesPorUsuario/");
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

    public function actualizarEstadoReporte() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_reporte = isset($_POST['id_reporte']) ? $_POST['id_reporte'] : null;
            $estado_reporte = isset($_POST['estado_reporte']) ? $_POST['estado_reporte'] : null;
            $fecha_solucion = null;
    
            if ($estado_reporte == '2') {
                $fecha_solucion = date('Y-m-d H:i:s'); // Usar la fecha actual si se aprueba el reporte
            }
    
            try {
                $result = $this->reporteModel->actualizarEstadoReporte($id_reporte, $estado_reporte, $fecha_solucion);
    
                if ($result) {
                    echo json_encode(['success' => true, 'fecha_solucion' => $fecha_solucion]);
                } else {
                    echo json_encode(['success' => false, 'error' => 'No se pudo actualizar el reporte.']);
                }
            } catch (Exception $e) {
                echo json_encode(['success' => false, 'error' => $e->getMessage()]);
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Método de solicitud no permitido.']);
        }
    }
    
}
?>