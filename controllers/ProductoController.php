<?php

require_once 'models/ProductoModel.php';

class ProductoController {
    private $productoModel;

    public function __construct() {
        $this->productoModel = new ProductoModel();
    }

    public function listarProductos() {
        $productos = $this->productoModel->obtenerTodosLosProductos();
        include 'views/administrador/productos/index.php'; // Cambiado a include
    }

    public function crearProducto() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            $precio = $_POST["precio"];
            $stock = $_POST["stock"];
            $fecha_creacion = $_POST["fecha_creacion"]; // Corrección aquí
    
            if ($this->productoModel->crearProducto($nombre, $descripcion, $precio, $stock, $fecha_creacion)) {
                // Redirigir con una alerta de éxito
                echo "
                    <script>
                        alert('Producto creado exitosamente');
                        window.location.href = '../listarProductos';
                    </script>
                ";
                exit();
            } else {
                // Redirigir con una alerta de error
                echo "
                    <script>
                        alert('Error al crear el producto');
                        window.history.back();
                    </script>
                ";
                exit();
            }
        } else {
            include 'views/administrador/productos/create.php'; // Suponiendo que existe una vista de creación
        }
    }
    

    public function actualizarProducto($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            $precio = $_POST["precio"];
            $stock = $_POST["stock"];
            $fecha_creacion = $_POST["fecha_creacion"];
            if ($this->productoModel->actualizarProducto($id, $nombre, $descripcion, $precio, $stock, $fecha_creacion)) {
                // Redirigir con una alerta de éxito
                echo "
                    <script>
                        alert('Producto actualizado exitosamente');
                        window.location.href = '../listarProductos';
                    </script>
                ";
                exit();
            } else {
                // Redirigir con una alerta de error
                echo "
                    <script>
                        alert('Error al actualizar el producto');
                        window.history.back();
                    </script>
                ";
                exit();
            }
        } else {
            $producto = $this->productoModel->obtenerProductoPorId($id); // Método para obtener producto por ID
            include 'views/administrador/productos/update.php'; // Suponiendo que existe una vista de actualización
        }
    }

    public function eliminarProducto() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            if ($this->productoModel->eliminarProducto($id)) {
                echo "
                    <script>
                        alert('Producto eliminado exitosamente');
                        window.location.href = 'index.php?controller=Producto&action=listarProductos';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Error al eliminar el producto');
                        window.history.back();
                    </script>
                ";
            }
            exit();
        }
    }
    
}
?>