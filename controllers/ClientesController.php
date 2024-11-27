<?php

require_once 'models/ClientesModel.php';

class ClientesController {

    public function clientes() {
        $clientesModel = new ClientesModel();
        $clientes = $clientesModel->obtenerTodosLosClientes();
        include 'views/administrador/clientes/index.php';
    }

    public function createCliente() {
        session_start(); // Iniciar sesión para manejar notificaciones

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $documento_nit = $_POST["documento_nit"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            $email = $_POST["email"];

            $clientesModel = new ClientesModel();
            $result = $clientesModel->guardarCliente($nombre, $documento_nit, $direccion, $telefono, $email);

            if ($result === true) {
                $_SESSION['mensaje'] = "Cliente creado con éxito.";
                $_SESSION['mensaje_tipo'] = "success"; // Para estilos visuales
                header("Location: ../clientes");
                exit();
            } elseif (is_string($result)) {
                $_SESSION['mensaje'] = $result; // Ejemplo: "El cliente ya existe."
                $_SESSION['mensaje_tipo'] = "warning";
                header("Location: index.php?action=createCliente");
                exit();
            } else {
                $_SESSION['mensaje'] = "Error al crear el cliente.";
                $_SESSION['mensaje_tipo'] = "danger";
                header("Location: index.php?action=createCliente");
                exit();
            }
        } else {
            include 'views/administrador/clientes/create.php';
        }
    }

    public function updateCliente($id) {
        session_start(); // Iniciar sesión para manejar notificaciones

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $documento_nit = $_POST["documento_nit"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            $email = $_POST["email"];

            $clientesModel = new ClientesModel();
            $result = $clientesModel->modificarCliente($id, $nombre, $documento_nit, $direccion, $telefono, $email);

            if ($result === true) {
                $_SESSION['mensaje'] = "Cliente actualizado con éxito.";
                $_SESSION['mensaje_tipo'] = "success";
                header("Location: ../clientes");
                exit();
            } else {
                $_SESSION['mensaje'] = "Error al actualizar el cliente.";
                $_SESSION['mensaje_tipo'] = "danger";
                header("Location: index.php?action=updateCliente&id=$id");
                exit();
            }
        } else {
            $clientesModel = new ClientesModel();
            $cliente = $clientesModel->obtenerClientePorId($id);
            include 'views/administrador/clientes/update.php';
        }
    }
}
