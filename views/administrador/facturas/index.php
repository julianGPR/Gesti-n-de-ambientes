<?php require_once "views/administrador/Vista/parte_superior.php" ?>

<main>
    <div class="container-fluid">
        <div class="header-section">
            <h1><i class="fas fa-tags"></i> Listado de Facturas</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><i class="fas fa-home"></i> Menú</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <a href='/gafra/facturas/create/' id="btn-create">
                    Nueva Factura
                </a>
            </div>
        </div>
        <div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>Lista de Productos
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table id="tablaFacturas" class="table table-bordered" width="100%" cellspacing="0">
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
                            <a href="/gafra/facturas/detalle/<?php echo $factura['id']; ?>" 
                                class="btn btn-info btn-sm">Ver</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</main>
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
</main>


<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2019</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
<script src="../assets/Js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="../assets/demo/chart-area-demo.js"></script>
<script src="../assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="../assets/demo/datatables-demo.js"></script>
<!-- CSS de DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<!-- CSS de los botones -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.dataTables.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery DataTables -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- JS de botones de DataTables -->
<script src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js"></script>

<!-- Librería para exportar a Excel, PDF, etc. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.print.min.js"></script>

<script>

$(document).ready(function() {
        $('#tablaFacturas').DataTable({
            "paging": true,          // Habilitar paginación
            "searching": true,       // Habilitar búsqueda
            "lengthChange": true,    // Habilitar selección de filas visibles
            "language": {
                "lengthMenu": "Mostrar _MENU_ filas por página",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay datos disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });

    function cargarFactura(button) {
        const facturaId = button.getAttribute("data-id");

        fetch(`gafra/facturas/detalle/${facturaId}`)
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