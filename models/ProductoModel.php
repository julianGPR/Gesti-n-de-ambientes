<?php

require_once 'config/db.php';

class ProductoModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function obtenerTodosLosProductos() {
        $conn = Database::connect();
        $sql = "SELECT * FROM productos";
        $result = $conn->query($sql);

        $productos = [];
        while ($fila = $result->fetch_assoc()) {
            $productos[] = $fila;
        }

        return $productos;
    }

    public function obtenerStockProducto($id_producto) {
        $conn = Database::connect();
        $sql = "SELECT stock FROM productos WHERE id_producto = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_producto);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_assoc()['stock'];
        } else {
            return null;
        }
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

    public function actualizarStockProducto($id_producto, $cantidad_reducir) {
        $conn = Database::connect();

        // Reducir el stock disponible
        $sql = "UPDATE productos SET stock = stock - ? WHERE id_producto = ? AND stock >= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $cantidad_reducir, $id_producto, $cantidad_reducir);

        return $stmt->execute();
    }

}
?>