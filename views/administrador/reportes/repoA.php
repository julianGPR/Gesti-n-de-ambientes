<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes por Tipo de Área</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f3f5f7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #343a40;
            padding-top: 70px;
            padding-bottom: 70px;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background-color: #007bff;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            font-weight: 600;
            letter-spacing: 1px;
            color: #fff;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 600;
            color: #343a40;
            margin-top: 20px;
        }

        .table-container {
            margin-top: 30px;
        }

        .table {
            background-color: #ffffff;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table thead th {
            background-color: #007bff;
            color: #ffffff;
        }

        .alert {
            margin-top: 20px;
        }

        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            right: 0;
            padding: 20px;
            background-color: #333;
            color: #fff;
            text-align: center;
        }

        footer a {
            color: #f8f9fa;
            text-decoration: none;
            transition: color 0.2s;
        }

        footer a:hover {
            color: #007bff;
        }

        /* Estilo para el interruptor */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input { 
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: red;
            transition: 0.4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: green;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Gestión de Reportes</a>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container">
        <h1 class="mb-4 text-center">Reportes de Área: <span class="text-primary"><?php echo htmlspecialchars($tipo_area); ?></span></h1>

        <?php if (!empty($reportes)): ?>
            <div class="table-responsive">
                <table id="tablaReportes" class="table table-bordered table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">ID Reporte</th>
                            <th scope="col">Fecha y Hora</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Área</th>
                            <th scope="col">Estado Reporte</th>
                            <th scope="col">Fecha Solución</th>
                            <th scope="col">Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reportes as $reporte): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($reporte['Id_reporte']); ?></td>
                                <td><?php echo htmlspecialchars($reporte['FechaHora']); ?></td>
                                <td><?php echo htmlspecialchars($reporte['Nombres'] . ' ' . $reporte['Apellidos']); ?></td>
                                <td><?php echo htmlspecialchars($reporte['nombre_area']); ?></td>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" class="toggle-switch" data-id="<?php echo $reporte['Id_reporte']; ?>" <?php echo $reporte['Estado_Reporte'] == '2' ? 'checked disabled' : ''; ?>>
                                        <span class="slider"></span>
                                    </label>
                                </td>
                                <td class="fecha-solucion" data-id="<?php echo $reporte['Id_reporte']; ?>">
                                    <?php echo htmlspecialchars($reporte['Fecha_Solucion']); ?>
                                </td>
                                <td><?php echo htmlspecialchars($reporte['Observaciones']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
            <a href="../reportes" class="btn btn-secondary btn-lg">
                <i class="bi bi-arrow-left-circle"></i> Regresar
            </a>
        </div>
        <?php else: ?>
            <div class="alert alert-warning text-center mt-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i> No hay reportes para el tipo de área seleccionado.
            </div>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p class="mb-0">© 2024 Gestión de Reportes. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS y dependencias de DataTables -->
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
        $(document).ready(function() {
            $('#tablaReportes').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'print'
                ],
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json" // Traducción al español
                }
            });

            $('.toggle-switch').change(function() {
                const idReporte = $(this).attr('data-id');
                const estadoReporte = $(this).is(':checked') ? '2' : '1';

                if (estadoReporte === '2' && confirm("¿Estás seguro de que deseas aprobar el reporte? Una vez aprobado, no se podrá deshacer.")) {
                    $.ajax({
                        url: '../actualizarEstadoReporte/', 
                        method: 'POST',
                        data: {
                            id_reporte: idReporte,
                            estado_reporte: estadoReporte
                        },
                        success: function(response) {
    try {
        const res = JSON.parse(response);
        if (res.success) {
            // Actualizar la fecha de solución en la tabla
            const fechaActual = new Date().toLocaleString();
            $(`.fecha-solucion[data-id="${idReporte}"]`).text(fechaActual);
            $(this).prop('checked', true); // Dejar el interruptor activado
        } else {
            console.error("Error en la respuesta del servidor:", res.error);
        }
    } catch (e) {
        console.error("Error al analizar JSON. Respuesta recibida:", response);
    }
},

                        error: function(xhr, status, error) {
                            console.error("Error en la solicitud AJAX:", error);
                            console.error("Estado:", status);
                            console.error("Respuesta completa:", xhr.responseText); 
                        }
                    });
                } else {
                    $(this).prop('checked', false);
                }
            });
        });
    </script>   
</body>
</html>