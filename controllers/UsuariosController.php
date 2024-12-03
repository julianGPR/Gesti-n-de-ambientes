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
            $foto_perfil = isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == UPLOAD_ERR_OK 
                ? $_FILES['foto_perfil']['tmp_name'] 
                : null;

            $clave = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

            $usuariosModel = new UsuariosModel();
            $result = $usuariosModel->guardarUsuario($nombres, $apellidos, $clave, $correo, $rol, $foto_perfil);

            if ($result) {
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

    public function updateUsuario($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombres = $_POST["nombres"];
            $apellidos = $_POST["apellidos"];
            $clave = !empty($_POST["clave"]) ? $_POST["clave"] : null; // Solo pasa la clave si no está vacía
            $correo = $_POST["correo"];
            $rol = $_POST["rol"];
            $foto_perfil = isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == UPLOAD_ERR_OK 
                ? $_FILES['foto_perfil']['tmp_name'] 
                : null;
    
            $usuariosModel = new UsuariosModel();
            $result = $usuariosModel->modificarUsuario($id, $nombres, $apellidos, $clave, $correo, $rol, $foto_perfil);
    
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

    public function perfil() {
        session_start(); // Asegúrate de que la sesión esté iniciada
        $id_usuario = $_GET['id'] ?? $_SESSION['Id_usuario']; // Obtén el ID del usuario desde la URL o la sesión
        
        $usuariosModel = new UsuariosModel();
        $usuario = $usuariosModel->obtenerUsuarioPorId($id_usuario);
    
        if (!$usuario) {
            // Redirigir o mostrar un mensaje de error si no se encuentra el usuario
            die('Error: Usuario no encontrado.');
        }
    
        // Codificar la foto de perfil si existe
        if (!empty($usuario['foto_perfil'])) {
            $usuario['foto_perfil'] = 'data:image/jpeg;base64,' . base64_encode($usuario['foto_perfil']);
        }
    
        require_once 'views/administrador/usuarios/perfil.php';
    }
    
    
    

    // Mostrar el formulario de edición del perfil
    public function editarPerfil() {
        session_start();
        $usuarioModel = new UsuariosModel();
        $id = $_SESSION['Id_usuario'];
        $usuario = $usuarioModel->obtenerUsuarioPorId($id);
        
        include 'views/administrador/usuarios/editar_perfil.php';
    }

    // Actualizar el perfil del usuario
    public function actualizarPerfil() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_SESSION['Id_usuario'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $correo = $_POST['correo'];
            $especialidad = $_POST['especialidad'];
            $foto_perfil = isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == UPLOAD_ERR_OK 
                ? $_FILES['foto_perfil']['tmp_name'] 
                : null;
    
            $usuarioModel = new UsuariosModel();
            $result = $usuarioModel->actualizarPerfil($id, $nombres, $apellidos, $correo, $especialidad, $foto_perfil);
    
            if ($result) {
                header("Location: /gafra/usuarios/perfil");
            } else {
                echo "Error al actualizar el perfil.";
            }
            exit();
        }
    }
        
}
?>
