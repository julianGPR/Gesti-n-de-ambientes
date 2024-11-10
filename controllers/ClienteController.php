<?php

require_once 'models/ClienteModel.php';

class ClienteController {
    private $clienteModel;

    public function __construct() {
        $this->clienteModel = new ClienteModel();
    }

    public function listarClientes() {
        $clientes = $this->clienteModel->obtenerTodosLosClientes();
        include 'views/administrador/clientes/index.php';
    }

    public function crearCliente() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            $correo = $_POST["correo"];
    
            if ($this->clienteModel->crearCliente($nombre, $direccion, $telefono, $correo)) {
                echo "
                    <script>
                        alert('Cliente creado exitosamente');
                        window.location.href = '../listarClientes';
                    </script>
                ";
                exit();
            } else {
                echo "
                    <script>
                        alert('Error al crear el cliente');
                        window.history.back();
                    </script>
                ";
                exit();
            }
        } else {
            include 'views/administrador/clientes/create.php';
        }
    }

    public function actualizarCliente($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            $correo = $_POST["correo"];
            if ($this->clienteModel->actualizarCliente($id, $nombre, $direccion, $telefono, $correo)) {
                echo "
                    <script>
                        alert('Cliente actualizado exitosamente');
                        window.location.href = '../listarClientes';
                    </script>
                ";
                exit();
            } else {
                echo "
                    <script>
                        alert('Error al actualizar el cliente');
                        window.history.back();
                    </script>
                ";
                exit();
            }
        } else {
            $cliente = $this->clienteModel->obtenerClientePorId($id);
            include 'views/administrador/clientes/update.php';
        }
    }

    public function eliminarCliente() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            if ($this->clienteModel->eliminarCliente($id)) {
                echo "
                    <script>
                        alert('Cliente eliminado exitosamente');
                        window.location.href = 'index.php?controller=Cliente&action=listarClientes';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Error al eliminar el cliente');
                        window.history.back();
                    </script>
                ";
            }
            exit();
        }
    }
}
?>
