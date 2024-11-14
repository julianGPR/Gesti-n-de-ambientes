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

     // Código para manejar la creación del cliente (obtener datos de POST y llamar a modelo)
    public function crearCliente() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            $correo = $_POST["correo"];

            if ($this->clienteModel->crearCliente($nombre, $direccion, $telefono, $correo)) {
                echo "Redirigiendo a la lista de clientes...";
                // Redirigir a la lista de clientes después de la creación exitosa
                header("Location: ../index.php?url=cliente/listarClientes");
                exit();

            } else {
                // Mostrar un mensaje de error si falla la creación
                echo "
                    <script>
                        alert('Error al crear el cliente');
                        window.history.back();
                    </script>
                ";
                exit();
            }
        } else {
            // Cargar la vista del formulario de creación
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
                // Redirección a la lista de clientes después de la actualización exitosa
                header("Location: ../index.php?url=cliente/listarClientes");
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
