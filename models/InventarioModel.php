<?php
require_once 'config/db.php';

class InventarioModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Obtener todas las entradas de inventario con el nombre del usuario y del proveedor
    public function obtenerEntradas($tipo_area = null) {
        $sql = "SELECT ie.*, u.Nombres AS nombre_usuario, u.Apellidos AS apellido_usuario, p.nombre_proveedor, ie.nombre, at.tipo_area
                FROM inventario_entrada AS ie
                JOIN t_usuarios AS u ON ie.Id_usuario = u.Id_usuario
                JOIN proveedores AS p ON ie.proveedor_id = p.id_proveedor
                LEFT JOIN AreaTrabajo AS at ON ie.id_area = at.id_area";

        if ($tipo_area) {
            $sql .= " WHERE at.tipo_area = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("s", $tipo_area);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            $result = $this->db->query($sql);
        }

        $entradas = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $entradas[] = $row;
            }
        }
        return $entradas;
    }
    
    // Obtener una entrada de inventario por ID
    public function obtenerEntradaPorId($id) {
        $sql = "SELECT ie.*, at.tipo_area 
                FROM inventario_entrada AS ie 
                LEFT JOIN AreaTrabajo AS at ON ie.id_area = at.id_area 
                WHERE ie.id_entrada = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    public function crearEntrada($id_usuario, $proveedor_id, $cantidad, $precio_unitario, $unidad_medida, $ubicacion, $fecha_entrada, $observaciones, $nombre, $id_area) {
        $sql = "INSERT INTO inventario_entrada (Id_usuario, proveedor_id, cantidad, precio_unitario, unidad_medida, ubicacion, fecha_entrada, observaciones, nombre, id_area) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        
        if (!$stmt) {
            throw new Exception("Error en la preparación de la consulta: " . $this->db->error);
        }
        
        // Asegúrate de que los parámetros coincidan en cantidad con los valores que estás pasando
        $stmt->bind_param("iiidsssssi", $id_usuario, $proveedor_id, $cantidad, $precio_unitario, $unidad_medida, $ubicacion, $fecha_entrada, $observaciones, $nombre, $id_area);
        
        return $stmt->execute();
    }
    

    public function actualizarEntrada($id, $id_usuario, $proveedor_id, $cantidad, $precio_unitario, $unidad_medida, $ubicacion, $fecha_entrada, $observaciones, $nombre, $tipo_area) {
        $sql = "UPDATE inventario_entrada SET Id_usuario = ?, proveedor_id = ?, cantidad = ?, precio_unitario = ?, unidad_medida = ?, ubicacion = ?, fecha_entrada = ?, observaciones = ?, nombre = ?, id_area = ? WHERE id_entrada = ?";
        
        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            throw new Exception("Error en la preparación de la consulta: " . $this->db->error);
        }
        
        // Actualiza los tipos en bind_param para que coincidan con los parámetros proporcionados
        $stmt->bind_param("iiidssssssi", $id_usuario, $proveedor_id, $cantidad, $precio_unitario, $unidad_medida, $ubicacion, $fecha_entrada, $observaciones, $nombre, $tipo_area, $id);
        $resultado = $stmt->execute();
        $stmt->close();
    
        return $resultado;
    }

    // Eliminar una entrada de inventario
    public function eliminarEntrada($id) {
        $sql = "DELETE FROM inventario_entrada WHERE id_entrada = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // Obtener proveedores para el formulario de selección
    public function obtenerProveedores() {
        $sql = "SELECT id_proveedor, nombre_proveedor FROM proveedores";
        $result = $this->db->query($sql);

        $proveedores = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $proveedores[] = $row;
            }
        }
        return $proveedores;
    }
    public function obtenerAreasTrabajo() {
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
    public function obtenerTiposDeArea() {
        $sql = "SELECT DISTINCT tipo_area FROM AreaTrabajo";
        $result = $this->db->query($sql);
    
        $tiposDeArea = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $tiposDeArea[] = $row['tipo_area'];
            }
        }
        return $tiposDeArea;
    }    
    public function obtenerIdAreaPorTipo($tipo_area) {
        $sql = "SELECT id_area FROM AreaTrabajo WHERE tipo_area = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $tipo_area);
        $stmt->execute();
        $result = $stmt->get_result();
        $area = $result->fetch_assoc();
        return $area ? $area['id_area'] : null;
    }
    
    
}
?>