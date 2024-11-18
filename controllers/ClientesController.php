<?php

require_once 'models/ClientesModel.php';

class ClientesController {

    public function clientes() {
        $clientesModel = new ClientesModel();
        $clientes = $clientesModel->obtenerTodosLosClientes();
        include 'views/administrador/clientes/index.php';
    }

    public function createCliente() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $documento_nit = $_POST["documento_nit"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            $email = $_POST["email"];

            $clientesModel = new ClientesModel();
            $result = $clientesModel->guardarCliente($nombre, $documento_nit, $direccion, $telefono, $email);

            if ($result) {
                header("Location: ../clientes");
                exit();
            } else {
                header("Location: index.php?error=Error al crear el cliente");
                exit();
            }
        } else {
            include 'views/administrador/clientes/create.php';
        }
    }

    public function updateCliente($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $documento_nit = $_POST["documento_nit"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            $email = $_POST["email"];

            $clientesModel = new ClientesModel();
            $result = $clientesModel->modificarCliente($id, $nombre, $documento_nit, $direccion, $telefono, $email);

            if ($result) {
                header("Location: ../clientes");
                exit();
            } else {
                header("Location: index.php?error=Error al actualizar el cliente&id=$id");
                exit();
            }
        } else {
            $clientesModel = new ClientesModel();
            $cliente = $clientesModel->obtenerClientePorId($id);
            include 'views/administrador/clientes/update.php';
        }
    }
}
?>
