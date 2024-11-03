<?php

require_once 'models/UsuariosModel.php'; // Asegúrate de que la ruta y el nombre del archivo sean correctos

class UsuariosController {

    public function usuarios() {
        include 'views/administrador/usuarios/index.php';
    }

    // Método para crear un nuevo usuario
    public function createUsuario() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombres = $_POST["nombres"];
            $apellidos = $_POST["apellidos"];
            $correo = $_POST["correo"];
            $rol = $_POST["rol"];
            
            // Generar contraseña aleatoria de 4 dígitos
            $clave = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

            $usuariosModel = new UsuariosModel();
            $result = $usuariosModel->guardarUsuario($nombres, $apellidos, $clave, $correo, $rol);

            if ($result) {
                // Redirigir al usuario a la lista de usuarios
                header("Location: ../usuarios");
                exit();
            } else {
                header("Location: index.php?error=Error al crear el usuario");
                exit();
            }
        } else {
            include 'views/administrador/usuarios/create.php';
        }
    }

    // Método para actualizar un usuario existente
    public function updateUsuario($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombres = $_POST["nombres"];
            $apellidos = $_POST["apellidos"];
            $clave = $_POST["clave"];
            $correo = $_POST["correo"];
            $rol = $_POST["rol"];

            $usuariosModel = new UsuariosModel();
            $result = $usuariosModel->modificarUsuario($id, $nombres, $apellidos, $clave, $correo, $rol);

            if ($result) {
                header("Location: ../usuarios");
                exit();
            } else {
                header("Location: index.php?error=Error al actualizar el usuario&id=$id");
                exit();
            }
        } else {
            $usuariosModel = new UsuariosModel();
            $usuario = $usuariosModel->obtenerUsuarioPorId($id);
            include 'views/administrador/usuarios/update.php';
        }
    }

    public function inhabilitarUsuario($id) {
        $usuariosModel = new UsuariosModel(); // Corregido a UsuariosModel
        $result = $usuariosModel->inhabilitarUsuario($id);
    
        if ($result) {
            echo "<script>alert('Usuario inhabilitado exitosamente');</script>";
        } else {
            echo "<script>alert('Error al inhabilitar el usuario');</script>";
        }
        
        header("Location: ../usuarios");
        exit();
    }
    
    public function habilitarUsuario($id) {
        $usuariosModel = new UsuariosModel(); // Corregido a UsuariosModel
        $result = $usuariosModel->habilitarUsuario($id);
    
        if ($result) {
            echo "<script>alert('Usuario habilitado exitosamente');</script>";
        } else {
            echo "<script>alert('Error al habilitar el usuario');</script>";
        }
        
        header("Location: ../usuarios");
        exit();
    }
}
?>
