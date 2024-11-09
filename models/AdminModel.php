<?php
include_once 'config/db.php';

class AdminModel {
    // Guardar una nueva área de trabajo
    public function guardarAreaTrabajo($nombre_area, $capacidad, $ubicacion, $responsable, $tipo_area, $equipo_disponible, $estado_area, $fecha_creacion, $comentarios) {
        $conn = Database::connect();
        $sql = "INSERT INTO AreaTrabajo (nombre_area, capacidad, ubicacion, responsable, tipo_area, equipo_disponible, estado_area, fecha_creacion, comentarios) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisssssss", $nombre_area, $capacidad, $ubicacion, $responsable, $tipo_area, $equipo_disponible, $estado_area, $fecha_creacion, $comentarios);
        return $stmt->execute();
    }

    // Actualizar un área de trabajo existente
    public function modificarAreaTrabajo($id, $nombre_area, $capacidad, $ubicacion, $responsable, $tipo_area, $equipo_disponible, $estado_area, $comentarios) {
        $conn = Database::connect();
        $sql = "UPDATE AreaTrabajo SET nombre_area=?, capacidad=?, ubicacion=?, responsable=?, tipo_area=?, equipo_disponible=?, estado_area=?, comentarios=? WHERE id_area=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sissssssi", $nombre_area, $capacidad, $ubicacion, $responsable, $tipo_area, $equipo_disponible, $estado_area, $comentarios, $id);
        return $stmt->execute();
    }

    // Obtener un área de trabajo por su ID
    public function obtenerAreaTrabajoPorId($id) {
        $conn = Database::connect();
        $sql = "SELECT * FROM AreaTrabajo WHERE id_area=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Obtener usuarios para seleccionar como responsable
    public function obtenerUsuarios() {
        $conn = Database::connect();
        $sql = "SELECT Id_usuario, Nombres FROM t_usuarios";
        $result = $conn->query($sql);
        $usuarios = [];
        while ($row = $result->fetch_assoc()) {
            $usuarios[] = $row;
        }
        return $usuarios;
    }

    // Obtener tipos de área disponibles
    public function obtenerTiposDeArea() {
        $conn = Database::connect();
        $sql = "SELECT DISTINCT tipo_area FROM AreaTrabajo";
        $result = $conn->query($sql);
        $tiposDeArea = [];
        while ($row = $result->fetch_assoc()) {
            $tiposDeArea[] = $row['tipo_area'];
        }
        return $tiposDeArea;
    }
    public function inhabilitarAreaTrabajo($id) {
        $conn = Database::connect();
        $sql = "UPDATE AreaTrabajo SET estado_area = 'Inhabilitado' WHERE Id_area='$id'";
        
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function habilitarAreaTrabajo($id) {
        $conn = Database::connect();
        $sql = "UPDATE AreaTrabajo SET estado_area = 'Habilitado' WHERE Id_area='$id'";
        
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}

?>
