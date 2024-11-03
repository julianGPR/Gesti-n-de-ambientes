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
            margin: 0; /* Eliminar márgenes por defecto */
            padding-top: 70px; /* Espacio para el navbar */
            padding-bottom: 70px; /* Espacio para el footer */
            position: relative; /* Necesario para el footer */
        }

        .navbar {
            position: fixed; /* Fijar el navbar en la parte superior */
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000; /* Asegura que el navbar esté por encima del contenido */
            background-color: #007bff;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            font-weight: 600;
            letter-spacing: 1px;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 600;
            color: #343a40;
            margin-top: 20px;
        }

        .table-responsive {
            margin-top: 20px;
        }

        footer {
            position: fixed; /* Fijar el footer en la parte inferior */
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

        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body class="fade-in">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Gestión de Reportes</a>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container">
        <h1 class="mb-4 text-center">Reportes de Área: <span class="text-primary"><?php echo htmlspecialchars($tipo_area); ?></span></h1>

        <?php if (!empty($reportes)): ?>
            <!-- Tabla de reportes con DataTables -->
            <div class="table-responsive">
                <table id="tablaReportes" class="table table-bordered table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">ID Reporte</th>
                            <th scope="col">Fecha y Hora</th>
                            <th scope="col">ID Usuario</th>
                            <th scope="col">ID Área</th>
                            <th scope="col">Estado</th>
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
                                <td><?php echo htmlspecialchars($reporte['Id_usuario']); ?></td>
                                <td><?php echo htmlspecialchars($reporte['Id_area']); ?></td>
                                <td>
                                    <?php echo htmlspecialchars($reporte['Estado']); ?>
                                    <?php if ($reporte['Estado'] === 'Activo'): ?>
                                        <i class="bi bi-circle-fill text-success"></i>
                                    <?php elseif ($reporte['Estado'] === 'Inactivo'): ?>
                                        <i class="bi bi-circle-fill text-secondary"></i>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo htmlspecialchars($reporte['Estado_Reporte']); ?></td>
                                <td><?php echo htmlspecialchars($reporte['Fecha_Solucion']); ?></td>
                                <td><?php echo htmlspecialchars($reporte['Observaciones']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center mt-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i> No hay reportes para el tipo de área seleccionado.
            </div>
        <?php endif; ?>
        
        <div class="text-center mt-5">
            <?php $url_regresar = '../reportes'; ?>
            <a href="<?php echo $url_regresar; ?>" class="btn btn-secondary btn-lg">
                <i class="bi bi-arrow-left-circle"></i> Regresar
            </a>
        </div>
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
        });
    </script>
</body>
</html>
