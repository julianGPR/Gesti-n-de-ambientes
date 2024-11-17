<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Factura</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center mb-4">Factura #<?php echo htmlspecialchars($factura['id']); ?></h3>
                <div class="card">
                    <div class="card-body">
                        <!-- Información del Cliente -->
                        <h5>Información del Cliente</h5>
                        <p><strong>Nombre:</strong> <?php echo htmlspecialchars($factura['cliente_nombre']); ?></p>
                        <p><strong>Documento/NIT:</strong> <?php echo htmlspecialchars($factura['documento_nit']); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($factura['cliente_email']); ?></p>
                        <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($factura['cliente_telefono']); ?></p>

                        <!-- Información de la Factura -->
                        <h5>Información de la Factura</h5>
                        <p><strong>Fecha:</strong> <?php echo htmlspecialchars($factura['fecha']); ?></p>
                        <p><strong>Subtotal:</strong> <?php echo number_format($factura['subtotal'], 2); ?> COP</p>
                        <p><strong>IVA:</strong> <?php echo number_format($factura['iva'], 2); ?> COP</p>
                        <p><strong>Descuento:</strong> <?php echo number_format($factura['descuento'], 2); ?> COP</p>
                        <p><strong>Total:</strong> <?php echo number_format($factura['total'], 2); ?> COP</p>

                        <!-- Detalles de los Productos -->
                        <h5>Detalles de los Productos</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($detalles as $detalle): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($detalle['producto_nombre']); ?></td>
                                        <td><?php echo htmlspecialchars($detalle['cantidad']); ?></td>
                                        <td><?php echo number_format($detalle['precio_unitario'], 2); ?> COP</td>
                                        <td><?php echo number_format($detalle['subtotal'], 2); ?> COP</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <!-- Botones de Acción -->
                        <div class="text-right mt-4">
                            <button class="btn btn-primary" onclick="imprimirFactura()">Imprimir</button>
                            <a class="btn btn-success" href="/dashboard/gestion%20de%20ambientes/facturas/generarPDF/<?php echo $factura['id']; ?>" target="_blank">Exportar PDF</a>
                            <button class="btn btn-secondary" onclick="cerrarModal()">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function imprimirFactura() {
            window.print();
        }

        function cerrarModal() {
            document.getElementById('detalleFacturaModal').modal('hide');
        }
    </script>
</body>
</html>
