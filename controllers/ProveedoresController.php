<?php

require_once 'models/ProveedoresModel.php'; // Asegúrate de que la ruta y el nombre del archivo sean correctos

class ProveedoresController {

    public function proveedores() {
        session_start(); // Iniciar sesión para mensajes
        include 'views/administrador/proveedores/index.php';
    }

    // Método para crear un nuevo proveedor
    public function createProveedor() {
        session_start(); // Inicia la sesión para manejar mensajes

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre_proveedor"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            $email = $_POST["email"];

            $proveedoresModel = new ProveedoresModel();
            $result = $proveedoresModel->guardarProveedor($nombre, $direccion, $telefono, $email);

            if ($result) {
                $_SESSION['mensaje'] = "Proveedor creado exitosamente.";
                $_SESSION['tipo_mensaje'] = "success";
                header("Location: ../proveedores");
                exit();
            } else {
                $_SESSION['mensaje'] = "Error al crear el proveedor.";
                $_SESSION['tipo_mensaje'] = "danger";
                header("Location: index.php?action=createProveedor");
                exit();
            }
        } else {
            include 'views/administrador/proveedores/create.php';
        }
    }

    // Método para actualizar un proveedor existente
    public function updateProveedor($id_proveedor) {
        session_start(); // Inicia la sesión para manejar mensajes

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre_proveedor"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            $email = $_POST["email"];

            $proveedoresModel = new ProveedoresModel();
            $result = $proveedoresModel->modificarProveedor($id_proveedor, $nombre, $direccion, $telefono, $email);

            if ($result) {
                $_SESSION['mensaje'] = "Proveedor actualizado exitosamente.";
                $_SESSION['tipo_mensaje'] = "success";
                header("Location: ../proveedores");
                exit();
            } else {
                $_SESSION['mensaje'] = "Error al actualizar el proveedor.";
                $_SESSION['tipo_mensaje'] = "danger";
                header("Location: index.php?action=updateProveedor&id=$id_proveedor");
                exit();
            }
        } else {
            $proveedoresModel = new ProveedoresModel();
            $proveedor = $proveedoresModel->obtenerProveedorPorId($id_proveedor);
            include 'views/administrador/proveedores/update.php';
        }
    }
}
?>
