<?php

require_once 'config/db.php';

class ProductoModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function obtenerTodosLosProductos() {
        $sql = "SELECT * FROM productos";
        $resultado = $this->db->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    
    public function crearProducto($nombre, $descripcion, $precio, $stock, $fecha_creacion) {
        $stmt = $this->db->prepare("INSERT INTO productos (nombre, descripcion, precio, stock, fecha_creacion) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdis", $nombre, $descripcion, $precio, $stock, $fecha_creacion);
        return $stmt->execute();
    }
    
    public function actualizarProducto($id, $nombre, $descripcion, $precio, $stock, $fecha_creacion) {
        // Convertir a formato DATETIME
        $fecha_creacion = (new DateTime($fecha_creacion))->format('Y-m-d H:i:s');
        
        $stmt = $this->db->prepare("UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, stock = ?, fecha_creacion = ? WHERE id_producto = ?");
        $stmt->bind_param("ssdisi", $nombre, $descripcion, $precio, $stock, $fecha_creacion, $id);
        return $stmt->execute();
    }
    
    public function eliminarProducto($id) {
        $stmt = $this->db->prepare("DELETE FROM productos WHERE id_producto = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    
    
    public function obtenerProductoPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM productos WHERE id_producto = ?"); // Cambiar 'id' por 'id_producto'
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

}
?>
