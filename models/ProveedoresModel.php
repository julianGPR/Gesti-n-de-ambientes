<?php

require_once 'config/db.php';

class ProveedoresModel {
    
    public function guardarProveedor($nombre, $direccion, $telefono, $email) {
        $conn = Database::connect();
    
        $sql = "INSERT INTO proveedores (nombre_proveedor, direccion, telefono, email)
                VALUES (?, ?, ?, ?)";
    
        $stmt = $conn->prepare($sql);
    
        $stmt->bind_param("ssss", $nombre, $direccion, $telefono, $email);
    
        $result = $stmt->execute();
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function modificarProveedor($id_proveedor, $nombre, $direccion, $telefono, $email) {
        $conn = Database::connect();
    
        $sql = "UPDATE proveedores SET nombre_proveedor = ?, direccion = ?, telefono = ?, email = ? WHERE id_proveedor = ?";
    
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            return false;
        }
    
        $stmt->bind_param("ssssi", $nombre, $direccion, $telefono, $email, $id_proveedor);
    
        $result = $stmt->execute();
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    
        $stmt->close();
        $conn->close();
    }

    public function obtenerProveedorPorId($id_proveedor) {
        $conn = Database::connect();
        $sql = "SELECT * FROM proveedores WHERE id_proveedor = ?";
    
        // Preparar la declaración
        $stmt = $conn->prepare($sql);
    
        // Vincular los parámetros
        $stmt->bind_param("i", $id_proveedor);
    
        // Ejecutar la consulta
        $stmt->execute();
    
        // Obtener el resultado
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}
?>
