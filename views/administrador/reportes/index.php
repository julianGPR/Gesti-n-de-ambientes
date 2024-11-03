<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Panel Administrativo</title>
    <link rel="stylesheet" type="text/css" href="../assets/styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
=======
    <title>Reportes por Tipo de Área</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
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

        .btn-custom {
            width: 250px;
            padding: 20px;
            font-size: 1.2rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
        }

        .btn-custom:hover {
            color: #ffffff;
            background-color: #0056b3;
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0, 123, 255, 0.5);
        }

        .btn-secondary {
            font-size: 1.1rem;
            padding: 10px 20px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            color: #ffffff;
            transform: scale(1.05);
        }

        .container {
            max-width: 900px;
        }

        /* CSS para bajar el footer */
        footer {
            margin-top: 50px; /* Ajusta el valor según el espacio que desees */
            padding: 20px;
            background-color: #333;
            color: #fff;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: #f8f9fa;
            text-decoration: none;
            transition: color 0.2s;
        }

        footer a:hover {
            color: #007bff;
        }

        /* Animaciones adicionales */
        .fade-in {
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
    </style>
>>>>>>> actu_encargado
</head>

<body class="fade-in">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/dashboard/gestion%20de%20ambientes/reporte/reportes">Gestión de Reportes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reportes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Soporte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
<<<<<<< HEAD
    </header>
    <nav>
    <div class="column-toggle-buttons">
            <button class="toggle-vis" data-column="0">Instructor</button>
            <button class="toggle-vis" data-column="1">Ambiente</button>
            <button class="toggle-vis" data-column="2">Observaciones</button>
            <button class="toggle-vis" data-column="3">Fecha y Hora</button>
        </div>
    </nav>
    <section class="ambiente" id="section-ambiente">
        <div class="subtitulo-ambiente">
            <h2>Reportes</h2>
        </div>
        <div class="descripcion-ambiente">
            <p>Reportes por Instructor de cada Ambiente</p>
        </div>
        <div class="tabla-ambientes tabla-scroll">
            <table class="table table-striped table-dark table_id" border="1" id="tabla-ambientes">
                <thead>
                    <tr>
                        <th>Instructor</th>
                        <th>Ambiente</th>
                        <th>Observaciones</th>
                        <th>Fecha y Hora</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // Consulta SQL para seleccionar todos los registros de la tabla t_reportes
                $query = "SELECT r.Id_reporte, r.Observaciones, r.FechaHora, CONCAT(u.Nombres, ' ', u.Apellidos) AS NombreCompleto, a.Nombre AS ambiente
                        FROM t_reportes AS r
                        INNER JOIN t_usuarios AS u ON r.Id_usuario = u.Id_usuario
                        INNER JOIN t_ambientes AS a ON r.Id_ambiente = a.Id_ambiente";
                        
                $result = $db->query($query);

                if ($result->num_rows > 0) {
                    // Iterar sobre los resultados y mostrar cada registro en una fila de la tabla HTML
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['NombreCompleto'] . "</td>";
                        echo "<td>" . $row['ambiente'] . "</td>";
                        echo "<td>" . $row['Observaciones'] . "</td>";
                        echo "<td>" . $row['FechaHora'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Si no hay filas en el resultado, mostrar un mensaje de que no hay registros
                    echo "<tr><td colspan='4'>No hay registros</td></tr>";
                }
=======
    </nav>

    <!-- Contenido principal -->
    <div class="container text-center mt-5">
        <h1>Selecciona el Tipo de Área</h1>
        <p class="lead text-muted mb-4">Elige el área para la que deseas generar un reporte detallado.</p>

        <!-- Botones para cada tipo de área -->
        <div class="d-flex flex-wrap justify-content-center gap-4">
            <a href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Tuberia" class="btn btn-outline-primary btn-lg btn-custom">
                <i class="bi bi-pipe"></i> Tubería
            </a>
            <a href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Ensamble" class="btn btn-outline-primary btn-lg btn-custom">
                <i class="bi bi-tools"></i> Ensamble
            </a>
            <a href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Corte" class="btn btn-outline-primary btn-lg btn-custom">
                <i class="bi bi-scissors"></i> Corte
            </a>
            <a href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Satelite" class="btn btn-outline-primary btn-lg btn-custom">
                <i class="bi bi-satellite"></i> Satélite
            </a>
        </div>
>>>>>>> actu_encargado

        <!-- Botón de regresar -->
        <div class="mt-5">
            <?php $url_regresar = '../admin/home'; ?>
            <a href="<?php echo $url_regresar; ?>" class="btn btn-secondary">
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
<<<<<<< HEAD
    <script>
        $(document).ready(function() {
            var table = $('#tabla-ambientes').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                paging: true,
                pageLength: 10
            });

            // Configuración de los botones para mostrar/ocultar columnas
            $('.toggle-vis').on('click', function(e) {
                e.preventDefault();

                // Obtenemos el índice de la columna correspondiente al botón
                var columnIdx = parseInt($(this).attr('data-column'));

                // Obtenemos el estado de visibilidad de la columna y lo invertimos
                var column = table.column(columnIdx);
                column.visible(!column.visible());
            });
        });
    </script>
=======

    <!-- Bootstrap JS y dependencias de Iconos -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<<<<<<< HEAD
>>>>>>> actu_encargado
</body>
=======
    </body>
>>>>>>> actu_encargado

</html>
