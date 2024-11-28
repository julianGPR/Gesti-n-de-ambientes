<?php

require_once 'config/db.php';

class ClientesModel {

    public function guardarCliente($nombre, $documento_nit, $direccion, $telefono, $email) {
        $conn = Database::connect();

        // Verificar si el cliente ya existe basado en el email o documento NIT
        $sqlCheck = "SELECT * FROM clientes WHERE email = ? OR documento_nit = ?";
        $stmtCheck = $conn->prepare($sqlCheck);
        $stmtCheck->bind_param("ss", $email, $documento_nit);
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();

        if ($resultCheck->num_rows > 0) {
            // Cliente ya existe, devolver mensaje
            return "El cliente ya existe con este correo o documento.";
        }

        // Si no existe, guardar
        $sql = "INSERT INTO clientes (nombre, documento_nit, direccion, telefono, email, fecha_registro)
                VALUES (?, ?, ?, ?, ?, NOW())";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $nombre, $documento_nit, $direccion, $telefono, $email);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function modificarCliente($id, $nombre, $documento_nit, $direccion, $telefono, $email) {
        $conn = Database::connect();

        // Verificar si existe otro cliente con el mismo email o documento NIT (excluyendo el actual)
        $sqlCheck = "SELECT * FROM clientes WHERE (email = ? OR documento_nit = ?) AND id != ?";
        $stmtCheck = $conn->prepare($sqlCheck);
        $stmtCheck->bind_param("ssi", $email, $documento_nit, $id);
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();

        if ($resultCheck->num_rows > 0) {
            // Otro cliente ya tiene este email o documento NIT
            return "Otro cliente ya existe con este correo o documento.";
        }

        // Si no existe conflicto, actualizar
        $sql = "UPDATE clientes SET nombre = ?, documento_nit = ?, direccion = ?, telefono = ?, email = ? WHERE id = ?";

        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            return false;
        }

        $stmt->bind_param("sssssi", $nombre, $documento_nit, $direccion, $telefono, $email, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
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
