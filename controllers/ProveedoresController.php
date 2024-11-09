<?php

require_once 'models/ProveedoresModel.php'; // Asegúrate de que la ruta y el nombre del archivo sean correctos

class ProveedoresController {

    public function proveedores() {
        include 'views/administrador/proveedores/index.php';
    }

    // Método para crear un nuevo proveedor
    public function createProveedor() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre_proveedor"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            $email = $_POST["email"];

            $proveedoresModel = new ProveedoresModel();
            $result = $proveedoresModel->guardarProveedor($nombre, $direccion, $telefono, $email);

            if ($result) {
                // Redirigir al usuario a la lista de proveedores
                header("Location: ../proveedores");
                exit();
            } else {
                header("Location: index.php?error=Error al crear el proveedor");
                exit();
            }
        } else {
            include 'views/administrador/proveedores/create.php';
        }
    }

    // Método para actualizar un proveedor existente
    public function updateProveedor($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre_proveedor"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            $email = $_POST["email"];

            $proveedoresModel = new ProveedoresModel();
            $result = $proveedoresModel->modificarProveedor($id, $nombre, $direccion, $telefono, $email);

            if ($result) {
                header("Location: ../proveedores");
                exit();
            } else {
                header("Location: index.php?error=Error al actualizar el proveedor&id=$id");
                exit();
            }
        } else {
            $proveedoresModel = new ProveedoresModel();
            $proveedor = $proveedoresModel->obtenerProveedorPorId($id);
            include 'views/administrador/proveedores/update.php';
        }
    }
}
?>
