<?php
require_once 'config/db.php';

class ReporteModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function obtenerAreas() {
        $sql = "SELECT id_area, nombre_area FROM AreaTrabajo";
        $result = $this->db->query($sql);

        $areas = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $areas[] = $row;
            }
        }
        return $areas;
    }

    public function guardarReporte($id_area, $fechaHora, $id_usuario, $estado, $estado_reporte, $fecha_solucion, $observaciones) {
        $sql = "INSERT INTO t_reportes (Id_area, FechaHora, Id_usuario, Estado, Estado_Reporte, Fecha_Solucion, Observaciones) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            throw new Exception("Error en la preparación de la consulta: " . $this->db->error);
        }

        // Depuración: Mostrar los valores que se pasarán a la consulta
        echo "<pre>Valores a insertar:\n";
        var_dump($id_area, $fechaHora, $id_usuario, $estado, $estado_reporte, $fecha_solucion, $observaciones);
        echo "</pre>";

        $stmt->bind_param("isissss", $id_area, $fechaHora, $id_usuario, $estado, $estado_reporte, $fecha_solucion, $observaciones);
        $resultado = $stmt->execute();

        if (!$resultado) {
            throw new Exception("Error en la ejecución de la consulta: " . $stmt->error);
        }

        $stmt->close();
        return $resultado;
    }

    public function obtenerReportesPorUsuario($id_usuario) {
        $sql = "SELECT t_reportes.*, AreaTrabajo.nombre_area 
                FROM t_reportes 
                JOIN AreaTrabajo ON t_reportes.Id_area = AreaTrabajo.id_area 
                WHERE Id_usuario = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        $reportes = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $reportes[] = $row;
            }
        }
        
        $stmt->close();
        return $reportes;
    }
    public function obtenerReportePorArea($id_area) {
        $sql = "SELECT t_reportes.*, AreaTrabajo.nombre_area 
                FROM t_reportes 
                JOIN AreaTrabajo ON t_reportes.Id_area = AreaTrabajo.id_area 
                WHERE t_reportes.Id_area = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id_area);
        $stmt->execute();
        
        $result = $stmt->get_result();

        $reportes = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $reportes[] = $row;
            }
        }
        
        $stmt->close();

        return $reportes;
    }

    // Obtener reportes por tipo de área para el administrador
    public function obtenerReportePorTipoArea($tipo_area) {
        $sql = "SELECT t_reportes.*, AreaTrabajo.nombre_area 
                FROM t_reportes 
                JOIN AreaTrabajo ON t_reportes.Id_area = AreaTrabajo.id_area 
                WHERE AreaTrabajo.tipo_area = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $tipo_area);
        $stmt->execute();

        $result = $stmt->get_result();

        $reportes = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $reportes[] = $row;
            }
        }

        $stmt->close();

        return $reportes;
    }
}
?>