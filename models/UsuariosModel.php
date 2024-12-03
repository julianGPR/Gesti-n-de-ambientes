<?php

require_once 'config/db.php';

class UsuariosModel{

    public function guardarUsuario($nombres, $apellidos, $clave, $correo, $rol, $foto_perfil = null) {
        $conn = Database::connect();
        $hashed_password = password_hash($clave, PASSWORD_BCRYPT); // Encriptar la contraseña
    
        if ($foto_perfil) {
            $foto_perfil = file_get_contents($foto_perfil); // Convertir la imagen en binario
            $sql = "INSERT INTO t_usuarios (Nombres, Apellidos, Clave, Correo, Rol, foto_perfil)
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssb", $nombres, $apellidos, $hashed_password, $correo, $rol, $foto_perfil);
        } else {
            $sql = "INSERT INTO t_usuarios (Nombres, Apellidos, Clave, Correo, Rol)
                    VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $nombres, $apellidos, $hashed_password, $correo, $rol);
        }
    
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
    
        return $result;
    }
    

    public function modificarUsuario($id, $nombres, $apellidos, $clave, $correo, $rol, $foto_perfil = null) {
        $conn = Database::connect();
    
        // Construye la consulta dependiendo de si se proporciona una nueva contraseña
        if (!empty($clave)) {
            $hashed_password = password_hash($clave, PASSWORD_BCRYPT); // Encripta la nueva contraseña
            if ($foto_perfil) {
                $foto_perfil = file_get_contents($foto_perfil); // Convertir la imagen a binario
                $sql = "UPDATE t_usuarios SET Nombres = ?, Apellidos = ?, Clave = ?, Correo = ?, Rol = ?, foto_perfil = ? WHERE Id_usuario = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssi", $nombres, $apellidos, $hashed_password, $correo, $rol, $foto_perfil, $id);
            } else {
                $sql = "UPDATE t_usuarios SET Nombres = ?, Apellidos = ?, Clave = ?, Correo = ?, Rol = ? WHERE Id_usuario = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssi", $nombres, $apellidos, $hashed_password, $correo, $rol, $id);
            }
        } else {
            if ($foto_perfil) {
                $foto_perfil = file_get_contents($foto_perfil); // Convertir la imagen a binario
                $sql = "UPDATE t_usuarios SET Nombres = ?, Apellidos = ?, Correo = ?, Rol = ?, foto_perfil = ? WHERE Id_usuario = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssi", $nombres, $apellidos, $correo, $rol, $foto_perfil, $id);
            } else {
                $sql = "UPDATE t_usuarios SET Nombres = ?, Apellidos = ?, Correo = ?, Rol = ? WHERE Id_usuario = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssi", $nombres, $apellidos, $correo, $rol, $id);
            }
        }
    
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
    
        return $result;
    }
    

    public function obtenerUsuarioPorId($id) {
        $conn = Database::connect();
        $sql = "SELECT * FROM t_usuarios WHERE Id_usuario = ?";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    
        $resultado = $stmt->get_result();
    
        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
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

    public function actualizarPerfil($id, $nombres, $apellidos, $correo, $especialidad, $foto_perfil = null) {
        $conn = Database::connect();
    
        if ($foto_perfil) {
            $foto_perfil = file_get_contents($foto_perfil); // Convertir la imagen en binario
            $sql = "UPDATE t_usuarios SET Nombres = ?, Apellidos = ?, Correo = ?, Especialidad = ?, foto_perfil = ? WHERE Id_usuario = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssbi", $nombres, $apellidos, $correo, $especialidad, $foto_perfil, $id);
        } else {
            $sql = "UPDATE t_usuarios SET Nombres = ?, Apellidos = ?, Correo = ?, Especialidad = ? WHERE Id_usuario = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $nombres, $apellidos, $correo, $especialidad, $id);
        }
    
        if ($foto_perfil) {
            $stmt->send_long_data(4, $foto_perfil); // Enviar datos largos
        }
    
        $resultado = $stmt->execute();
        $stmt->close();
        $conn->close();
    
        return $resultado;
    }
}
?>