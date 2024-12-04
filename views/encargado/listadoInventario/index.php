<?php require_once "views/encargado/Vista/parte_superior.php" ?>
<?php if (isset($_SESSION['mensaje'])): ?>
    <div class="alert alert-<?= $_SESSION['tipo_mensaje']; ?>">
        <?= $_SESSION['mensaje']; ?>
    </div>
    <?php unset($_SESSION['mensaje'], $_SESSION['tipo_mensaje']); ?>
<?php endif; ?>
<main>
    <div class="container-fluid">
        <div class="header-section">
            <h1><i class="fas fa-briefcase"></i> Listado de Inventario</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><i class="fas fa-home"></i> Menú</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <a href='/gafra/inventario/crearEntrada' id="btn-create">
                    Crear Entrada
                </a>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Area de trabajo</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tabla-ambientes" id="dataTable" width="100%"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Entrada</th>
                                <th>Nombre</th>
                                <th>Proveedor</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Unidad de Medida</th>
                                <th>Ubicación</th>
                                <th>Fecha de Entrada</th>
                                <th>Observaciones</th>
                                <th>Responsable</th>
                                <th>Área de Trabajo</th>
                                <th>Acciones</th>
                            </tr>
                        <tbody>
                            <?php foreach ($entradas as $entrada): ?>
                                <tr>
                                    <td><?= htmlspecialchars($entrada['id_entrada']) ?></td>
                                    <td><?= htmlspecialchars($entrada['nombre']) ?></td>
                                    <td><?= htmlspecialchars($entrada['nombre_proveedor']) ?></td>
                                    <td><?= htmlspecialchars($entrada['cantidad']) ?></td>
                                    <td><?= htmlspecialchars($entrada['precio_unitario']) ?></td>
                                    <td><?= htmlspecialchars($entrada['unidad_medida']) ?></td>
                                    <td><?= htmlspecialchars($entrada['ubicacion']) ?></td>
                                    <td><?= htmlspecialchars($entrada['fecha_entrada']) ?></td>
                                    <td><?= htmlspecialchars($entrada['observaciones']) ?></td>
                                    <td><?= htmlspecialchars($entrada['nombre_usuario'] . ' ' . $entrada['apellido_usuario']) ?>
                                    </td>
                                    <td><?= htmlspecialchars($entrada['tipo_area']) ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="/gafra/inventario/editarEntrada/<?= $entrada['id_entrada'] ?>"
                                                class="btn btn-outline-primary btn-sm me-2 d-flex align-items-center">
                                                <i class="bi bi-pencil-fill me-1"></i> Editar
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; GAFRA 2024</div>
            </div>
        </div>
    </footer>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="/assets/Js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="/assets/demo/chart-area-demo.js"></script>
    <script src="/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="/assets/demo/datatables-demo.js"></script>
    <!-- Scripts de Bootstrap y DataTables -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#tablaInventario').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'print'
                ],
                language: {
                    url: "/data/es-ES.json" // Ruta local para evitar CORS
                }
            });
        });

    </script>
    <script>
        $(document).ready(function () {
            $('#tabla-ambientes').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        text: 'Copiar'
                    },
                    {
                        extend: 'csv',
                        text: 'CSV'
                    },
                    {
                        extend: 'excel',
                        text: 'Excel'
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF'
                    },
                    {
                        extend: 'print',
                        text: 'Imprimir'
                    }
                ],
                paging: true,
                pageLength: 5,
                language: {
                    processing: "Procesando...",
                    search: "Buscar:",
                    lengthMenu: "Mostrar _MENU_ registros",
                    info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    infoEmpty: "Mostrando 0 a 0 de 0 registros",
                    infoFiltered: "(filtrado de _MAX_ registros en total)",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron registros coincidentes",
                    emptyTable: "No hay datos disponibles en la tabla",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Último"
                    },
                    aria: {
                        sortAscending: ": activar para ordenar la columna de manera ascendente",
                        sortDescending: ": activar para ordenar la columna de manera descendente"
                    },
                    buttons: {
                        copy: "Copiar",
                        csv: "Exportar a CSV",
                        excel: "Exportar a Excel",
                        pdf: "Exportar a PDF",
                        print: "Imprimir"
                    }
                }
            });
        });

        function confirmarInhabilitar(id) {
            if (confirm("¿Estás seguro de que deseas inhabilitar esta área?")) {
                window.location.href = "inhabilitarAreaTrabajo/" + id;
            }
        }

        function confirmarHabilitar(id) {
            if (confirm("¿Estás seguro de que deseas habilitar esta área?")) {
                window.location.href = "habilitarAreaTrabajo/" + id;
            }
        }
    </script>
    </body>

    </html>