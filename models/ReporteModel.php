<?php
require_once 'config/db.php';
date_default_timezone_set('America/Bogota'); // Ajusta a la zona horaria correcta


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
    
        $stmt->bind_param("isissss", $id_area, $fechaHora, $id_usuario, $estado, $estado_reporte, $fecha_solucion, $observaciones);
        $resultado = $stmt->execute();
    
        if (!$resultado) {
            throw new Exception("Error en la ejecución de la consulta: " . $stmt->error);
        }
    
        $stmt->close();
        return $resultado;
    }
    

    public function obtenerReportesPorUsuario($id_usuario) {
        $sql = "SELECT t_reportes.*, AreaTrabajo.nombre_area, t_usuarios.Nombres, t_usuarios.Apellidos 
                FROM t_reportes 
                JOIN AreaTrabajo ON t_reportes.Id_area = AreaTrabajo.id_area 
                JOIN t_usuarios ON t_reportes.Id_usuario = t_usuarios.id_usuario 
                WHERE t_reportes.Id_usuario = ?";

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
        $sql = "SELECT t_reportes.*, AreaTrabajo.nombre_area, t_usuarios.Nombres, t_usuarios.Apellidos
                FROM t_reportes 
                JOIN AreaTrabajo ON t_reportes.Id_area = AreaTrabajo.id_area 
                JOIN t_usuarios ON t_reportes.Id_usuario = t_usuarios.id_usuario 
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

    public function obtenerReportePorTipoArea($tipo_area) {
        $sql = "SELECT t_reportes.*, AreaTrabajo.nombre_area, t_usuarios.Nombres, t_usuarios.Apellidos 
                FROM t_reportes 
                JOIN AreaTrabajo ON t_reportes.Id_area = AreaTrabajo.id_area 
                JOIN t_usuarios ON t_reportes.Id_usuario = t_usuarios.id_usuario 
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

    // Método para actualizar el estado del reporte y la fecha de solución
    public function actualizarEstadoReporte($id_reporte, $estado_reporte, $fecha_solucion = null) {
        $sql = "UPDATE t_reportes SET Estado_Reporte = ?, Fecha_Solucion = ? WHERE Id_reporte = ?";
        $stmt = $this->db->prepare($sql);
    
        if (!$stmt) {
            throw new Exception("Error en la preparación de la consulta: " . $this->db->error);
        }
    
        // Si el estado del reporte es '2' (aprobado), asignamos la fecha actual.
        if ($estado_reporte == '2') {
            $fecha_solucion = date('Y-m-d H:i:s'); // Fecha y hora actuales
        }
    
        $stmt->bind_param("isi", $estado_reporte, $fecha_solucion, $id_reporte);
        $result = $stmt->execute();
    
        if (!$result) {
            throw new Exception("Error en la ejecución de la consulta: " . $stmt->error);
        }
    
        $stmt->close();
        return $result;
    }
    
    
}
?>