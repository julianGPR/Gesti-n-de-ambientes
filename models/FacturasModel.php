<?php

require_once 'config/db.php';

class FacturasModel {

    // Crear una nueva factura
    public function crearFactura($id_cliente, $fecha, $subtotal, $iva, $descuento, $total) {
        $conn = Database::connect();
    
        $sql = "INSERT INTO facturas (id_cliente, fecha, subtotal, iva, descuento, total) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isdidd", $id_cliente, $fecha, $subtotal, $iva, $descuento, $total);
    
        if ($stmt->execute()) {
            $facturaId = $stmt->insert_id; // Devuelve el ID de la factura recién creada
            $stmt->close();
            $conn->close();
            return $facturaId; // Se utiliza para registrar los detalles de la factura
        } else {
            $stmt->close();
            $conn->close();
            return false;
        }
    }
    

    // Crear un nuevo detalle de factura
    public function crearDetalleFactura($id_factura, $id_producto, $cantidad, $precio_unitario, $subtotal, $descuento) {
        $conn = Database::connect();
    
        $sql = "INSERT INTO detalles_factura (id_factura, id_producto, cantidad, precio_unitario, subtotal, descuento) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiiddd", $id_factura, $id_producto, $cantidad, $precio_unitario, $subtotal, $descuento);
    
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
    
        return $result;
    }
    

    // Obtener datos de un producto por su ID
    public function obtenerProductoPorId($id_producto) {
        $conn = Database::connect();

        $sql = "SELECT * FROM productos WHERE id_producto = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_producto);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $producto = $result->fetch_assoc();
            $stmt->close();
            $conn->close();
            return $producto;
        } else {
            $stmt->close();
            $conn->close();
            return null;
        }
    }

    // Actualizar el stock de un producto
    public function actualizarStockProducto($id_producto, $cantidad_vendida) {
        $conn = Database::connect();

        $sql = "UPDATE productos SET stock = stock - ? WHERE id_producto = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $cantidad_vendida, $id_producto);

        $result = $stmt->execute();
        $stmt->close();
        $conn->close();

        return $result;
    }

    // Obtener todas las facturas
    public function obtenerFacturas() {
        $conn = Database::connect();

        $sql = "SELECT f.*, c.nombre AS cliente_nombre 
                FROM facturas f
                JOIN clientes c ON f.id_cliente = c.id
                ORDER BY f.fecha DESC";

        $result = $conn->query($sql);

        $facturas = [];
        while ($fila = $result->fetch_assoc()) {
            $facturas[] = $fila;
        }

        $conn->close();
        return $facturas;
    }

    // Obtener una factura por su ID
    public function obtenerFacturaPorId($id_factura) {
        $conn = Database::connect();

        $sql = "SELECT f.*, c.nombre AS cliente_nombre, c.documento_nit, c.email AS cliente_email, c.telefono AS cliente_telefono 
        FROM facturas f
        JOIN clientes c ON f.id_cliente = c.id
        WHERE f.id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_factura);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $factura = $result->fetch_assoc();
            $stmt->close();
            $conn->close();
            return $factura;
        } else {
            $stmt->close();
            $conn->close();
            return null;
        }
    }

    // Obtener los detalles de una factura por su ID
    public function obtenerDetallesPorFacturaId($id_factura) {
        $conn = Database::connect();

        $sql = "SELECT df.*, p.nombre AS producto_nombre 
                FROM detalles_factura df
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

        $stmt->close();
        $conn->close();

        return $detalles;
    }
}
