<?php require_once "views/administrador/Vista/parte_superior.php" ?>

<<<<<<< HEAD
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Panel   
 Administrativo</title>
    <link rel="stylesheet"   
 type="text/css" href="../assets/styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">   
=======
<style>
    body {
        background-color: #f0f2f5;
        font-family: Arial, sans-serif;
    }
>>>>>>> devJulian

    .header-section {
        background-color: #343a40;
        color: #f8f9fa;
        padding: 1rem;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    h1 {
        font-size: 1.8rem;
        font-weight: bold;
    }

    .breadcrumb {
        background-color: transparent;
        margin-bottom: 0;
        font-size: 0.9rem;
    }

<<<<<<< HEAD
=======
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
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
</head>

<body>
    <header>
<<<<<<< HEAD
        </header>
=======
        <div class="logo-container">
            <img src="../assets/Logo-Sena.jpg" alt="Logo de la empresa" class="logo">
        </div>
        <div class="title">
            <h1>Gestion de Reportes</h1>
        </div>
        <div class="datetime">
            <?php
                date_default_timezone_set('America/Bogota');
                $fechaActual = date("d/m/Y");
                $horaActual = date("h:i a");
            ?>
            <div class="datetime">
                <div class="fecha">
                    <p>Fecha actual: <?php echo $fechaActual; ?></p>
                </div>
                <div class="hora">
                    <p>Hora actual: <?php echo $horaActual; ?></p>
                </div>
            </div>
        </div>
    </header>
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
    <nav>
    <div class="column-toggle-buttons">
            <button class="toggle-vis" data-column="0">Instructor</button>
            <button class="toggle-vis" data-column="1">Ambiente</button>
            <button class="toggle-vis" data-column="2">Observaciones</button>
            <button class="toggle-vis" data-column="3">Fecha y Hora</button>
=======
    .breadcrumb-item.active {
        color: #adb5bd;
    }

    .breadcrumb .breadcrumb-item+.breadcrumb-item::before {
        color: #adb5bd;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
    }

    .card-body {
        font-weight: 600;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .card-footer {
        background-color: transparent;
        border-top: none;
    }
</style>
<main>
    <div class="container-fluid">
        
        <div class="header-section">
                <h1><i class="fas fa-file-alt"></i> Reportes por Tipo de Área </h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><i class="fas fa-home"></i> Menú</li>
                </ol>
            </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-pipe"></i> Tubería
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"
                            href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Tuberia">Ver
                            reporte</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-tools"></i> Ensamble
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"
                            href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Ensamble">Ver
                            reporte</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-cut"></i> Corte
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"
                            href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Corte">Ver
                            reporte</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <i class="fas fa-satellite-dish"></i> Satélite
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link"
                            href="/dashboard/gestion%20de%20ambientes/reporte/verReporteAdministrador/Satelite">Ver
                            reporte</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
>>>>>>> devJulian
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
<<<<<<< HEAD
        <div class="descripcion-ambiente">
<<<<<<< HEAD
            <p>Reportes por</p>
=======
            <p>Reportes por Instructor de cada Ambiente</p>
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
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
<<<<<<< HEAD
                $query = "SELECT r.Id_reporte, r.Observaciones, r.FechaHora,
                        CONCAT(u.Nombres, ' ', u.Apellidos) AS NombreCompleto,
                        a.nombre_area AS area
                            FROM t_reportes AS r
                            INNER JOIN t_usuarios AS u ON r.Id_usuario = u.Id_usuario
                            INNER JOIN AreaTrabajo AS a ON r.id_area = a.id_area";
=======
                $query = "SELECT r.Id_reporte, r.Observaciones, r.FechaHora, CONCAT(u.Nombres, ' ', u.Apellidos) AS NombreCompleto, a.Nombre AS ambiente
                        FROM t_reportes AS r
                        INNER JOIN t_usuarios AS u ON r.Id_usuario = u.Id_usuario
                        INNER JOIN t_ambientes AS a ON r.Id_ambiente = a.Id_ambiente";
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
                        
                $result = $db->query($query);

                if ($result->num_rows > 0) {
                    // Iterar sobre los resultados y mostrar cada registro en una fila de la tabla HTML
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['NombreCompleto'] . "</td>";
<<<<<<< HEAD
                        echo "<td>" . $row['area'] . "</td>";
=======
                        echo "<td>" . $row['ambiente'] . "</td>";
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
                        echo "<td>" . $row['Observaciones'] . "</td>";
                        echo "<td>" . $row['FechaHora'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Si no hay filas en el resultado, mostrar un mensaje de que no hay registros
                    echo "<tr><td colspan='4'>No hay registros</td></tr>";
                }

                // Cerrar la conexión a la base de datos
                $db->close();
                ?>
                </tbody>
            </table>
        </div>
        <div class="regresar">
            <?php
                $url_regresar = 'home';
            ?>
            <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
        </div>
        <div class="salir">
            <button id="btn_salir">Salir</button>
        </div>
    </section>
    <footer>
        <p>Sena todos los derechos reservados</p>
    </footer>
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
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
>>>>>>> devJulian
</body>

</html>