<?php

require_once 'models/ProductoModel.php';

class ProductoController {
    private $productoModel;

    public function __construct() {
        $this->productoModel = new ProductoModel();
        session_start(); // Iniciar la sesión para manejar mensajes
    }

    public function listarProductos() {
        $productos = $this->productoModel->obtenerTodosLosProductos();
        include 'views/administrador/productos/index.php';
    }

    public function crearProducto() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $descripcion = $_POST["descripcion"];
            $precio = $_POST["precio"];
            $stock = $_POST["stock"];
            $fecha_creacion = $_POST["fecha_creacion"];

            if ($this->productoModel->crearProducto($nombre, $descripcion, $precio, $stock, $fecha_creacion)) {
                $_SESSION['mensaje'] = "Producto creado exitosamente.";
                $_SESSION['tipo_mensaje'] = "success";
                header("Location: ../listarProductos");
                exit();
            } else {
                $_SESSION['mensaje'] = "Error al crear el producto.";
                $_SESSION['tipo_mensaje'] = "danger";
                header("Location: index.php?controller=Producto&action=crearProducto");
                exit();
            }
        } else {
            include 'views/administrador/productos/create.php';
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
                $_SESSION['mensaje'] = "Producto actualizado exitosamente.";
                $_SESSION['tipo_mensaje'] = "success";
                header("Location: ../listarProductos");
                exit();
            } else {
                $_SESSION['mensaje'] = "Error al actualizar el producto.";
                $_SESSION['tipo_mensaje'] = "danger";
                header("Location: index.php?controller=Producto&action=actualizarProducto&id=$id");
                exit();
            }
        } else {
            $producto = $this->productoModel->obtenerProductoPorId($id);
            include 'views/administrador/productos/update.php';
        }
    }

    public function eliminarProducto() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            if ($this->productoModel->eliminarProducto($id)) {
                $_SESSION['mensaje'] = "Producto eliminado exitosamente.";
                $_SESSION['tipo_mensaje'] = "success";
            } else {
                $_SESSION['mensaje'] = "Error al eliminar el producto.";
                $_SESSION['tipo_mensaje'] = "danger";
            }
            header("Location: index.php?controller=Producto&action=listarProductos");
            exit();
        }
    }
}
?>
