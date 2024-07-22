<?php

require_once 'config/db.php';

class UsuariosModel{

    public function guardarUsuario($nombres, $apellidos, $clave, $correo, $rol) {
        $conn = Database::connect();
    
        $sql = "INSERT INTO t_usuarios (Nombres, Apellidos, Clave, Correo, Rol)
                VALUES (?, ?, ?, ?, ?)";
    
        $stmt = $conn->prepare($sql);
    
        $stmt->bind_param("sssss", $nombres, $apellidos, $clave, $correo, $rol);
    
        $result = $stmt->execute();
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function modificarUsuario($id, $nombres, $apellidos, $clave, $correo, $rol) {
        $conn = Database::connect();
    
        $sql = "UPDATE t_usuarios SET Nombres = ?, Apellidos = ?, Clave = ?, Correo = ?, Rol = ? WHERE Id_usuario = ?";
    
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            return false;
        }
    
        $stmt->bind_param("sssssi", $nombres, $apellidos, $clave, $correo, $rol, $id);
    
        $result = $stmt->execute();
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    
        $stmt->close();
        $conn->close();
    }
    
    public function obtenerUsuarioPorId($id) {
        $conn = Database::connect();
        $sql = "SELECT * FROM t_usuarios WHERE Id_usuario=?";
    
        // Preparar la declaración
        $stmt = $conn->prepare($sql);
    
        // Vincular los parámetros
        $stmt->bind_param("i", $id);
    
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
    public function inhabilitarUsuario($id) {
        $conn = Database::connect();
        $sql = "UPDATE t_usuarios SET Estado = 'Inhabilitado' WHERE Id_usuario='$id'";
        
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function habilitarUsuario($id) {
        $conn = Database::connect();
        $sql = "UPDATE t_usuarios SET Estado = 'Habilitado' WHERE Id_usuario='$id'";
        
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>