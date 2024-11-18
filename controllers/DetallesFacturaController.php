<?php

require_once 'models/DetallesFacturaModel.php';
require_once 'models/ProductosModel.php';

class DetallesFacturaController {

    // Agregar un nuevo detalle a una factura
    public function agregarDetalle($id_factura) {
        $productosModel = new ProductoModel();

        // Obtener todos los productos para el formulario
        $productos = $productosModel->obtenerTodosLosProductos();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id_producto = $_POST["id_producto"];
            $cantidad = $_POST["cantidad"];
            $precio_unitario = $_POST["precio_unitario"];
            $subtotal = $cantidad * $precio_unitario;
            $descuento = $_POST["descuento"] ?? 0;

            $detallesFacturaModel = new DetallesFacturaModel();
            $result = $detallesFacturaModel->guardarDetalle($id_factura, $id_producto, $cantidad, $precio_unitario, $subtotal, $descuento);

            if ($result) {
                header("Location: /facturas/detalle/" . $id_factura);
                exit();
            } else {
                $error = "Error al agregar el detalle.";
            }
        }

        include 'views/administrador/detalles_factura/create.php';
    }
}
?>
