<?php

require_once 'models/UsuariosModel.php'; // Asegúrate de que la ruta y el nombre del archivo sean correctos

class UsuariosController {

    public function usuarios() {
        session_start();
        include 'views/administrador/usuarios/index.php';
    }

    // Método para crear un nuevo usuario
    public function createUsuario() {
        session_start(); // Inicia la sesión para manejar mensajes

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
                $_SESSION['mensaje'] = "Usuario creado exitosamente.";
                $_SESSION['tipo_mensaje'] = "success";
                header("Location: ../usuarios");
                exit();
            } else {
                $_SESSION['mensaje'] = "Error al crear el usuario.";
                $_SESSION['tipo_mensaje'] = "danger";
                header("Location: index.php?action=createUsuario");
                exit();
            }
        } else {
            include 'views/administrador/usuarios/create.php';
        }
    }

    public function updateUsuario($id) {
        session_start(); // Inicia la sesión para manejar mensajes

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombres = $_POST["nombres"];
            $apellidos = $_POST["apellidos"];
            $clave = !empty($_POST["clave"]) ? $_POST["clave"] : null;
            $correo = $_POST["correo"];
            $rol = $_POST["rol"];
            $foto_perfil = isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == UPLOAD_ERR_OK 
                ? $_FILES['foto_perfil']['tmp_name'] 
                : null;

            $usuariosModel = new UsuariosModel();
            $result = $usuariosModel->modificarUsuario($id, $nombres, $apellidos, $clave, $correo, $rol, $foto_perfil);

            if ($result) {
                $_SESSION['mensaje'] = "Usuario actualizado exitosamente.";
                $_SESSION['tipo_mensaje'] = "success";
                header("Location: ../usuarios");
                exit();
            } else {
                $_SESSION['mensaje'] = "Error al actualizar el usuario.";
                $_SESSION['tipo_mensaje'] = "danger";
                header("Location: index.php?action=updateUsuario&id=$id");
                exit();
            }
        } else {
            $usuariosModel = new UsuariosModel();
            $usuario = $usuariosModel->obtenerUsuarioPorId($id);
            include 'views/administrador/usuarios/update.php';
        }
    }

    public function inhabilitarUsuario($id) {
        session_start(); // Inicia la sesión para manejar mensajes

        $usuariosModel = new UsuariosModel();
        $result = $usuariosModel->inhabilitarUsuario($id);

        if ($result) {
            $_SESSION['mensaje'] = "Usuario inhabilitado exitosamente.";
            $_SESSION['tipo_mensaje'] = "success";
        } else {
            $_SESSION['mensaje'] = "Error al inhabilitar el usuario.";
            $_SESSION['tipo_mensaje'] = "danger";
        }

        header("Location: ../usuarios");
        exit();
    }

    public function habilitarUsuario($id) {
        session_start(); // Inicia la sesión para manejar mensajes

        $usuariosModel = new UsuariosModel();
        $result = $usuariosModel->habilitarUsuario($id);

        if ($result) {
            $_SESSION['mensaje'] = "Usuario habilitado exitosamente.";
            $_SESSION['tipo_mensaje'] = "success";
        } else {
            $_SESSION['mensaje'] = "Error al habilitar el usuario.";
            $_SESSION['tipo_mensaje'] = "danger";
        }

        header("Location: ../usuarios");
        exit();
    }

    public function perfil() {
        session_start();
        $id_usuario = $_GET['id'] ?? $_SESSION['Id_usuario'];

        $usuariosModel = new UsuariosModel();
        $usuario = $usuariosModel->obtenerUsuarioPorId($id_usuario);

        if (!$usuario) {
            die('Error: Usuario no encontrado.');
        }

        if (!empty($usuario['foto_perfil'])) {
            $usuario['foto_perfil'] = 'data:image/jpeg;base64,' . base64_encode($usuario['foto_perfil']);
        }

        include 'views/administrador/usuarios/perfil.php';
    }

    public function editarPerfil() {
        session_start();
        $usuarioModel = new UsuariosModel();
        $id = $_SESSION['Id_usuario'];
        $usuario = $usuarioModel->obtenerUsuarioPorId($id);

        include 'views/administrador/usuarios/editar_perfil.php';
    }

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
                $_SESSION['mensaje'] = "Perfil actualizado exitosamente.";
                $_SESSION['tipo_mensaje'] = "success";
                header("Location: /gafra/usuarios/perfil");
                exit();
            } else {
                $_SESSION['mensaje'] = "Error al actualizar el perfil.";
                $_SESSION['tipo_mensaje'] = "danger";
                header("Location: index.php?action=editarPerfil");
                exit();
            }
        }
    }
}
?>
