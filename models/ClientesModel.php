<?php

require_once 'config/db.php';

class ClientesModel {

    public function guardarCliente($nombre, $documento_nit, $direccion, $telefono, $email) {
        $conn = Database::connect();

        $sql = "INSERT INTO clientes (nombre, documento_nit, direccion, telefono, email, fecha_registro)
                VALUES (?, ?, ?, ?, ?, NOW())";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $nombre, $documento_nit, $direccion, $telefono, $email);

        $result = $stmt->execute();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function modificarCliente($id, $nombre, $documento_nit, $direccion, $telefono, $email) {
        $conn = Database::connect();

        $sql = "UPDATE clientes SET nombre = ?, documento_nit = ?, direccion = ?, telefono = ?, email = ? WHERE id = ?";

        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            return false;
        }

        $stmt->bind_param("sssssi", $nombre, $documento_nit, $direccion, $telefono, $email, $id);

        $result = $stmt->execute();

        if ($result) {
            return true;
        } else {
            return false;
        }

        $stmt->close();
        $conn->close();
    }

    public function obtenerClientePorId($id) {
        $conn = Database::connect();
        $sql = "SELECT * FROM clientes WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function obtenerTodosLosClientes() {
        $conn = Database::connect();
        $sql = "SELECT * FROM clientes";
        $result = $conn->query($sql);

        $clientes = [];
        while ($fila = $result->fetch_assoc()) {
            $clientes[] = $fila;
        }

        return $clientes;
    }
}
?>
