<?php

require_once 'config/db.php';

class ClienteModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function obtenerTodosLosClientes() {
        $sql = "SELECT * FROM clientes";
        $resultado = $this->db->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    
    public function crearCliente($nombre, $direccion, $telefono, $correo) {
        $stmt = $this->db->prepare("INSERT INTO clientes (nombre, direccion, telefono, correo) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $direccion, $telefono, $correo);
        return $stmt->execute();
    }
    
    public function actualizarCliente($id, $nombre, $direccion, $telefono, $correo) {
        $stmt = $this->db->prepare("UPDATE clientes SET nombre = ?, direccion = ?, telefono = ?, correo = ? WHERE id_cliente = ?");
        $stmt->bind_param("ssssi", $nombre, $direccion, $telefono, $correo, $id);
        return $stmt->execute();
    }
    
    public function eliminarCliente($id) {
        $stmt = $this->db->prepare("DELETE FROM clientes WHERE id_cliente = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    
    public function obtenerClientePorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE id_cliente = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }
}
?>
