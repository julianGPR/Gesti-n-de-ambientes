<?php

require_once 'config/db.php';

class DetallesFacturaModel {

    // Guardar un nuevo detalle de factura
    public function guardarDetalle($id_factura, $id_producto, $cantidad, $precio_unitario, $subtotal, $descuento = 0) {
        $conn = Database::connect();
        $sql = "INSERT INTO detalles_factura (id_factura, id_producto, cantidad, precio_unitario, subtotal, descuento)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiiddd", $id_factura, $id_producto, $cantidad, $precio_unitario, $subtotal, $descuento);

        return $stmt->execute();
    }

    // Obtener detalles de factura por ID de factura
    public function obtenerDetallesPorFactura($id_factura) {
        $conn = Database::connect();
        $sql = "SELECT df.*, p.nombre AS producto_nombre FROM detalles_factura df
                JOIN productos p ON df.id_producto = p.id_producto
                WHERE df.id_factura = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_factura);
        $stmt->execute();

        $result = $stmt->get_result();

        $detalles = [];
        while ($fila = $result->fetch_assoc()) {
            $detalles[] = $fila;
        }

        return $detalles;
    }
}
?>
