<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Listado de Facturas</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="/dashboard/gestion%20de%20ambientes/facturas/create/" class="btn btn-primary">Crear Nueva Factura</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($facturas as $factura): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($factura['id']); ?></td>
                        <td><?php echo htmlspecialchars($factura['cliente_nombre']); ?></td>
                        <td><?php echo htmlspecialchars($factura['fecha']); ?></td>
                        <td>$<?php echo number_format($factura['total'], 2); ?></td>
                        <td>
                        <td>
                            <a href="/dashboard/gestion%20de%20ambientes/facturas/detalle/<?php echo $factura['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                        </td>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para mostrar la factura -->
    <div class="modal fade" id="facturaModal" tabindex="-1" aria-labelledby="facturaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="facturaModalLabel">Detalle de la Factura</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí se cargará dinámicamente la factura -->
                    <div id="detalleFactura">Cargando...</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="imprimirFactura()">Imprimir</button>
                    <button type="button" class="btn btn-success" onclick="exportarPDF()">Exportar PDF</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function cargarFactura(button) {
            const facturaId = button.getAttribute("data-id");

            fetch(`dashboard/gestion%20de%20ambientes/facturas/detalle/${facturaId}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("detalleFactura").innerHTML = data;
                })
                .catch(error => console.error("Error al cargar la factura:", error));
        }

        function imprimirFactura() {
            const contenido = document.getElementById("detalleFactura").innerHTML;
            const ventana = window.open("", "_blank");
            ventana.document.write(`
                <html>
                    <head>
                        <title>Factura</title>
                    </head>
                    <body>${contenido}</body>
                </html>
            `);
            ventana.document.close();
            ventana.print();
        }

        function exportarPDF() {
            alert("Función de exportar a PDF pendiente de implementación.");
        }
    </script>
</body>
</html>
