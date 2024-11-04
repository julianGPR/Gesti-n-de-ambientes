<?php
require_once 'config/db.php';

class InventarioModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Obtener todas las entradas de inventario con el nombre del usuario que las modificó
    public function obtenerEntradas() {
        $sql = "SELECT ie.*, u.Nombres AS nombre_usuario, u.Apellidos AS apellido_usuario, p.nombre_proveedor
                FROM inventario_entrada AS ie
                JOIN t_usuarios AS u ON ie.Id_usuario = u.Id_usuario
                JOIN proveedores AS p ON ie.proveedor_id = p.id_proveedor";
                
        $result = $this->db->query($sql);
        
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
        $sql = "SELECT * FROM inventario_entrada WHERE id_entrada = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Crear una nueva entrada de inventario
    public function crearEntrada($id_usuario, $proveedor_id, $cantidad, $precio_unitario, $unidad_medida, $ubicacion, $fecha_entrada, $observaciones) {
        $sql = "INSERT INTO inventario_entrada (Id_usuario, proveedor_id, cantidad, precio_unitario, unidad_medida, ubicacion, fecha_entrada, observaciones) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("iiidssss", $id_usuario, $proveedor_id, $cantidad, $precio_unitario, $unidad_medida, $ubicacion, $fecha_entrada, $observaciones);
        return $stmt->execute();
    }

    // Actualizar una entrada de inventario
    public function actualizarEntrada($id, $id_usuario, $proveedor_id, $cantidad, $precio_unitario, $unidad_medida, $ubicacion, $fecha_entrada, $observaciones) {
        $sql = "UPDATE inventario_entrada SET Id_usuario = ?, proveedor_id = ?, cantidad = ?, precio_unitario = ?, unidad_medida = ?, ubicacion = ?, fecha_entrada = ?, observaciones = ? WHERE id_entrada = ?";
        
        $stmt = $this->db->prepare($sql);
        if (!$stmt) {
            throw new Exception("Error en la preparación de la consulta: " . $this->db->error);
        }
        
        // Aquí nos aseguramos de que hay 9 parámetros en total
        $stmt->bind_param("iiidssssi", $id_usuario, $proveedor_id, $cantidad, $precio_unitario, $unidad_medida, $ubicacion, $fecha_entrada, $observaciones, $id);
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
}
?>