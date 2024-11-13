<?php require_once "views/encargado/Vista/parte_superior.php"?>
<link href="../../assets/css/styles.css" rel="stylesheet" />
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Gestion de Inventarios Gafra</h1>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <?php
                                $url_create = '/dashboard/gestion%20de%20ambientes/reporte/createReporte';
                                ?>
                                <a class="small text-white stretched-link" href="<?php echo $url_create; ?>"
                                    id="btn-create">Crear Nuevo Reporte</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Reporte</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tablaReportes" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID Reporte</th>
                                        <th>Fecha y Hora</th>
                                        <th>Área</th>
                                        <th>Estado Reporte</th>
                                        <th>Fecha Solución</th>
                                        <th>Observaciones</th>
                                    </tr>
                                <tbody>
                                    <?php foreach ($reportes as $reporte): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($reporte['Id_reporte']); ?></td>
                                            <td><?php echo htmlspecialchars($reporte['FechaHora']); ?></td>
                                            <td><?php echo htmlspecialchars($reporte['nombre_area']); ?></td>
                                            <td><?php echo $reporte['Estado_Reporte'] == 2 ? 'Confirmado' : 'Pendiente'; ?>
                                            </td>
                                            <td><?php echo !empty($reporte['Fecha_Solucion']) ? htmlspecialchars($reporte['Fecha_Solucion']) : 'Sin aprobar'; ?>
                                            </td>

                                            <td><?php echo htmlspecialchars($reporte['Observaciones']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            </section>
                            <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
                                crossorigin="anonymous"></script>
                            <script src="../../assets/Js/scripts.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
                                crossorigin="anonymous"></script>
                            <script src="../../assets/demo/chart-area-demo.js"></script>
                            <script src="../../assets/demo/chart-bar-demo.js"></script>
                            <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"
                                crossorigin="anonymous"></script>
                            <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"
                                crossorigin="anonymous"></script>
                            <script src="../../assets/demo/datatables-demo.js"></script>
                            <!-- Bootstrap JS y dependencias de DataTables -->
                            <script
                                src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
                            <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
                            <script
                                src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
                            <script
                                src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
                            <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
                            <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

                            <script>
                                $(document).ready(function () {
                                    $('#tablaReportes').DataTable({
                                        dom: 'Bfrtip',
                                        buttons: [
                                            'copy', 'csv', 'excel', 'print'
                                        ],
                                        language: {
                                            url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                                        }
                                    });
                                });
                            </script>

<script>

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