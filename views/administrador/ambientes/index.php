<?php require_once "views/administrador/Vista/parte_superior.php" ?>
<main>
    <div class="container-fluid">
        <div class="header-section">
            <h1><i class="fas fa-briefcase"></i> Area de Trabajo</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><i class="fas fa-home"></i> Menú</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <a href='/dashboard/gestion%20de%20ambientes/admin/createAreaTrabajo/' id="btn-create">
                    Crear area de trabajo
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
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Capacidad</th>
                                <th>Ubicacion</th>
                                <th>Responsable</th>
                                <th>Area</th>
                                <th>Equipo</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Comentarios</th>
                                <th>Accion</th>
                            </tr>
                        <tbody>
                            <?php
                            // Consulta para seleccionar las áreas de trabajo
                            $query = "SELECT * FROM AreaTrabajo";
                            if (!empty($filtros)) {
                                $query .= " WHERE " . implode(" AND ", $filtros);
                            }

                            $result = $db->query($query);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['id_area']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['nombre_area']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['capacidad']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['ubicacion']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['responsable']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['tipo_area']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['equipo_disponible']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['estado_area']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['fecha_creacion']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['comentarios']) . "</td>";

                                    // Sección de botones de acción en una sola línea
                                    echo "<td class='acciones'>";

                                    // Botón de editar (si el área no está inhabilitada)
                                    if ($row['estado_area'] !== 'Inhabilitado') {
                                        $url_update = '/dashboard/gestion%20de%20ambientes/admin/updateAreaTrabajo/';
                                        echo "<a href='" . $url_update . $row['id_area'] . "' class='boton-modificar boton-accion' title='Editar'>
                    <img src='../assets/editar.svg' alt='Editar' class='icono-accion'>
                  </a>";
                                    }

                                    // Botón de habilitar (si el área no está habilitada)
                                    if ($row['estado_area'] !== 'Habilitado') {
                                        echo "<a href='#' onclick='confirmarHabilitar(" . $row['id_area'] . ")' class='boton-habilitar boton-accion' title='Habilitar'>
                    <img src='../assets/habilitar.svg' alt='Habilitar' class='icono-accion'>
                  </a>";
                                    }

                                    // Botón de inhabilitar (si el área no está inhabilitada)
                                    if ($row['estado_area'] !== 'Inhabilitado') {
                                        echo "<a href='#' onclick='confirmarInhabilitar(" . $row['id_area'] . ")' class='boton-inhabilitar boton-accion' title='Inhabilitar'>
                    <img src='../assets/inhabilitar1.svg' alt='Inhabilitar' class='icono-accion'>
                  </a>";
                                    }

                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='11'>No hay registros</td></tr>";
                            }

                            $db->close();
                            ?>

                        </tbody>
                    </table>
                    </section>
                    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
                        crossorigin="anonymous"></script>
                    <script src="../assets/Js/scripts.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
                        crossorigin="anonymous"></script>
                    <script src="../assets/demo/chart-area-demo.js"></script>
                    <script src="../assets/demo/chart-bar-demo.js"></script>
                    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"
                        crossorigin="anonymous"></script>
                    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"
                        crossorigin="anonymous"></script>
                    <script src="../assets/demo/datatables-demo.js"></script>
                    <!-- CSS de DataTables -->
                    <link rel="stylesheet" type="text/css"
                        href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

                    <!-- CSS de los botones -->
                    <link rel="stylesheet" type="text/css"
                        href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.dataTables.min.css">

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
                            $('#tabla-ambientes').DataTable({
                                dom: 'Bfrtip',
                                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                                paging: true,
                                pageLength: 5
                            });
                        });

                        function confirmarHabilitar(id) {
                            if (confirm("¿Está seguro de que desea habilitar este área de trabajo?")) {
                                window.location.href = '/dashboard/gestion%20de%20ambientes/admin/habilitarAreaTrabajo/' + id;
                            }
                        }

                        function confirmarInhabilitar(id) {
                            if (confirm("¿Está seguro de que desea inhabilitar este área de trabajo?")) {
                                window.location.href = '/dashboard/gestion%20de%20ambientes/admin/inhabilitarAreaTrabajo/' + id;
                            }
                        }

                    </script>
                    </body>

                    </html>