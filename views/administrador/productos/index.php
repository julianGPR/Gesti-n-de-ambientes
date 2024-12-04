<?php require_once "views/administrador/Vista/parte_superior.php" ?>

<main>
    <div class="container-fluid">
        <div class="header-section">
            <h1><i class="fas fa-tags"></i> Gestion de Productos</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><i class="fas fa-home"></i> Menú</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <a href='/gafra/Producto/crearProducto/' id="btn-create">
                    Nuevo Producto
                </a>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Lista de Productos</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tabla-productos" id="dataTable" width="100%"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Fecha de creacion</th>
                                <th>Acciones</th>
                            </tr>
                        <tbody>
                            <?php foreach ($productos as $producto): ?>
                                <tr>
                                    <td><?php echo $producto['id_producto']; ?></td>
                                    <td><?php echo $producto['nombre']; ?></td>
                                    <td><?php echo $producto['descripcion'] ?></td>
                                    <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                                    <td><?php echo $producto['stock'] ?></td>
                                    <td><?php echo $producto['fecha_creacion'] ?></td>
                                    <td>
                                        <?php
                                        $url_update = '/gafra/producto/actualizarProducto/' . $producto['id_producto'];
                                        echo "<a href='$url_update' class='boton-modificar'><img src='../assets/editar.svg' alt='Editar'></a>";
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; GAFRA 2024</div>
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
    $(document).ready(function () {
        $('#tabla-productos').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'], // Botones traducidos
            paging: true,
            pageLength: 10,
            language: {
                processing: "Procesando...",
                search: "Buscar:",
                lengthMenu: "Mostrar _MENU_ registros",
                info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                infoEmpty: "Mostrando 0 a 0 de 0 registros",
                infoFiltered: "(filtrado de _MAX_ registros totales)",
                loadingRecords: "Cargando...",
                zeroRecords: "No se encontraron resultados",
                emptyTable: "No hay datos disponibles en la tabla",
                paginate: {
                    first: "Primero",
                    previous: "Anterior",
                    next: "Siguiente",
                    last: "Último"
                },
                buttons: {
                    copy: "Copiar",
                    csv: "CSV",
                    excel: "Excel",
                    pdf: "PDF",
                    print: "Imprimir"
                }
            }
        });
    });

</script>
</body>

</html>