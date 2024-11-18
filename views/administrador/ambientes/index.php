<<<<<<< HEAD
<?php
<<<<<<< HEAD
    // Conectar a la base de datos
    require_once 'config/db.php';
    $db = Database::connect();
=======
// Conectar a la base de datos
require_once 'config/db.php';
$db = Database::connect();
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
    <link rel="stylesheet" type="text/css" href="../assets/styles.css">
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<<<<<<< HEAD
=======
=======
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
</head>

<body>
    <header>
        <div class="logo-container">
            <img src="../assets/Logo-Sena.jpg" alt="Logo de la empresa" class="logo">
=======
<?php require_once "views/administrador/Vista/parte_superior.php" ?>
<main>
    <div class="container-fluid">
        <div class="header-section">
            <h1><i class="fas fa-briefcase"></i> Area de Trabajo</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><i class="fas fa-home"></i> Menú</li>
            </ol>
>>>>>>> devJulian
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <a href='/dashboard/gestion%20de%20ambientes/admin/createAreaTrabajo/' id="btn-create">
                    Crear area de trabajo
                </a>
            </div>

            <!-- Menú de filtros lateral -->
            <div class="filter-menu" id="filterMenu" style="display:none;">
                <h3>Filtrar Columnas</h3>
                <button class="toggle-vis" data-column="0">Id</button>
                <button class="toggle-vis" data-column="1">Nombre</button>
                <button class="toggle-vis" data-column="2">Capacidad</button>
                <button class="toggle-vis" data-column="3">Ubicacion</button>
                <button class="toggle-vis" data-column="4">Responsable</button>
                <button class="toggle-vis" data-column="5">Tipo area</button>
                <button class="toggle-vis" data-column="6">Equipo disponible</button>
                <button class="toggle-vis" data-column="7">Estado area</button>
                <button class="toggle-vis" data-column="8">Fecha creacion</button>
                <button class="toggle-vis" data-column="9">Comentarios</button>
                <button class="toggle-vis" data-column="10">Accion</button>
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
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD
    </header>
    <nav>
<<<<<<< HEAD
        <div>
            <button class="toggle-vis" data-column="0">Id</button>
            <button class="toggle-vis" data-column="1">Nombre</button>
            <button class="toggle-vis" data-column="2">Capacidad</button>
            <button class="toggle-vis" data-column="3">Ubicacion</button>
            <button class="toggle-vis" data-column="4">Responsable</button>
            <button class="toggle-vis" data-column="5">Tipo area</button>
            <button class="toggle-vis" data-column="6">Equipo disponible</button>
            <button class="toggle-vis" data-column="7">Estado area</button>
            <button class="toggle-vis" data-column="8">Fecha creacion</button>
            <button class="toggle-vis" data-column="9">Comentarios</button>
            <button class="toggle-vis" data-column="10">Accion</button>
        </div>
    </nav>
=======
<<<<<<< HEAD
    <div>
        <button class="toggle-vis" data-column="0">Id</button>
        <button class="toggle-vis" data-column="0">Nombre</button>
        <button class="toggle-vis" data-column="1">Torre</button>
        <button class="toggle-vis" data-column="2">Computadores</button>
        <button class="toggle-vis" data-column="3">Tvs</button>
        <button class="toggle-vis" data-column="4">Sillas</button>
        <button class="toggle-vis" data-column="5">Mesas</button>
        <button class="toggle-vis" data-column="6">Tableros</button>
        <button class="toggle-vis" data-column="7">Niñeras</button>
        <button class="toggle-vis" data-column="8">Accion</button>
    </div>
    </nav>
=======
        <div class="filtro-y-crear">
            <div class="filtro">
                <label for="filtro_ambiente">Buscar Ambiente:</label>
                <input type="text" id="filtro_ambiente" name="filtro_ambiente">
            </div>
            <div class="crear-ambiente">
                <ul>
                    <?php
                    // Construir la URL adecuada para el botón de "Gestión de Ambientes"
                    $url_create = '/dashboard/gestion%20de%20ambientes/admin/createAmbiente/' ; // Corregir la construcción de la URL
                    ?>
                    <li><a href="<?php echo $url_create; ?>" id="btn-create">Crear Nuevo Ambiente</a></li>
                </ul>
            </div>
        </div>
    </nav>  
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
    <section class="ambiente" id="section-ambiente">
        <div class="subtitulo-ambiente">
            <h2>Areas de trabajo</h2>
        </div>
        <div class="descripcion-ambiente">
            <p>Gestión de areas de trabajo</p>
        </div>
        <div class="tabla-ambientes tabla-scroll">
<<<<<<< HEAD
            <table class="table table-striped table-dark table_id" border="1" id="tabla-ambientes">
=======
<<<<<<< HEAD
    <table class="table table-striped table-dark table_id" border="1" id="tabla-ambientes">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Torre</th>
                    <th>Computadores</th>
                    <th>Tvs</th>
                    <th>Sillas</th>
                    <th>Mesas</th>
                    <th>Tableros</th>
                    <th>Niñeras</th>
                    <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM t_ambientes";

                    if (!empty($filtros)) {
                        $query .= " WHERE " . implode(" AND ", $filtros);
                    }

                    $result = $db->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['Id_ambiente'] . "</td>";
                            echo "<td>" . $row['Nombre'] . "</td>";
                            echo "<td>" . $row['Torre'] . "</td>";
                            echo "<td>" . $row['Computadores'] . "</td>";
                            echo "<td>" . $row['Tvs'] . "</td>";
                            echo "<td>" . $row['Sillas'] . "</td>";
                            echo "<td>" . $row['Mesas'] . "</td>";
                            echo "<td>" . $row['Tableros'] . "</td>";
                            echo "<td>" . $row['Nineras'] . "</td>";
                            echo "<td>";
                            if ($row['Estado'] !== 'Inhabilitado') {
                                $url_update = '/dashboard/gestion%20de%20ambientes/admin/updateAmbiente/';
                                echo "<a href='" . $url_update . $row['Id_ambiente'] . "' class='boton-modificar'><img src='../assets/editar.svg'></a>";

                                $url_update = '/dashboard/gestion%20de%20ambientes/admin/generateQR/';
                                echo "<a href='" . $url_update . $row['Id_ambiente'] . "' class='boton-generar-qr' boton-accion ><img src='../assets/qr-code.svg'></a>";
                            } else {
                                echo "<a href='#' onclick='confirmarHabilitar(" . $row['Id_ambiente'] . ")' class='boton-habilitar boton-accion'><img src='../assets/habilitar.svg'></a>";
                            }
                            if ($row['Estado'] !== 'Inhabilitado') {
                                echo "<a href='#' onclick='confirmarInhabilitar(" . $row['Id_ambiente'] . ")' class='boton-inhabilitar boton-accion'><img src='../assets/inhabilitar1.svg'></a>";
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
        </div>
        <div class="filtro-y-crear">
            <div class="crear-ambiente">
                <?php
                $url_create = '/dashboard/gestion%20de%20ambientes/admin/createAmbiente/';
                ?>
                <ul>
                    <li><a href="<?php echo $url_create; ?>" id="btn-create">Crear Nuevo Ambiente</a></li>
                </ul>
            </div>
        </div>
=======
            <table border="1" >
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Capacidad</th>
                        <th>Ubicacion</th>
                        <th>Responsable</th>
                        <th>Tipo de Area</th>
                        <th>Equipo disponible</th>
                        <th>Estado area</th>
                        <th>Fecha de creacion</th>
                        <th>Comentarios</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM AreaTrabajo";

                    if (!empty($filtros)) {
                        $query .= " WHERE " . implode(" AND ", $filtros);
                    }

                    $result = $db->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id_area'] . "</td>";
                            echo "<td>" . $row['nombre_area'] . "</td>";
                            echo "<td>" . $row['capacidad'] . "</td>";
                            echo "<td>" . $row['ubicacion'] . "</td>";
                            echo "<td>" . $row['responsable'] . "</td>";
                            echo "<td>" . $row['tipo_area'] . "</td>";
                            echo "<td>" . $row['equipo_disponible'] . "</td>";
                            echo "<td>" . $row['estado_area'] . "</td>";
                            echo "<td>" . $row['fecha_creacion'] . "</td>";
                            echo "<td>" . $row['comentarios'] . "</td>";
                            echo "<td>";
                            if ($row['estado_area'] !== 'Inhabilitado') {
                                $url_update = '/dashboard/gestion%20de%20ambientes/admin/updateAreaTrabajo/';
                                echo "<a href='" . $url_update . $row['id_area'] . "' class='boton-modificar'><img src='../assets/editar.svg'></a>";

                                $url_update = '/dashboard/gestion%20de%20ambientes/admin/generateQR/';
                                echo "<a href='" . $url_update . $row['id_area'] . "' class='boton-generar-qr' boton-accion ><img src='../assets/qr-code.svg'></a>";
                            } else {
                                echo "<a href='#' onclick='confirmarHabilitar(" . $row['id_area'] . ")' class='boton-habilitar boton-accion'><img src='../assets/habilitar.svg'></a>";
                            }
                            if ($row['estado_area'] !== 'Inhabilitado') {
                                echo "<a href='#' onclick='confirmarInhabilitar(" . $row['id_area'] . ")' class='boton-inhabilitar boton-accion'><img src='../assets/inhabilitar1.svg'></a>";
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
        </div>
<<<<<<< HEAD
        <div class="filtro-y-crear">
            <div class="crear-area">
                <?php
                $url_create = '/dashboard/gestion%20de%20ambientes/admin/createAreaTrabajo/';
                ?>
                <ul>
                    <li><a href="<?php echo $url_create; ?>" id="btn-create">Crear Nueva area de trabajo</a></li>
                </ul>
            </div>
        </div>
=======
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
        <div class="regresar">
            <?php
            $url_regresar = 'home';
            ?>
<<<<<<< HEAD
            <a href="<?php echo $url_regresar; ?>"class="button boton-centrado" id="btn-regresar">Regresar</a>
=======
            <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
        </div>
        <div class="salir">
            <button id="btn_salir">Salir</button>
        </div>
    </section>
    <script>
<<<<<<< HEAD
        $(document).ready(function() {
            var table = $('#tabla-ambientes').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                paging: true,
                pageLength: 10
            });
=======
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
>>>>>>> devJulian

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
        $('#tabla-ambientes').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            paging: true,
            pageLength: 5
        });
<<<<<<< HEAD
    </script>
    <script>
        function confirmarInhabilitar(id) {
            if (confirm("¿Estás seguro de que deseas inhabilitar esta area?")) {
                window.location.href = "inhabilitarAreaTrabajo/" + id;
            }
=======
<<<<<<< HEAD
    $(document).ready(function() {
        var table = $('#tabla-ambientes').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            paging: true,
            pageLength: 10
        });

        // Escuchar eventos de clic en los botones de mostrar/ocultar columnas
        $('button.toggle-vis').on('click', function(e) {
            e.preventDefault();

            // Obtener el índice de la columna desde el atributo data-column del botón
            var columnIdx = $(this).attr('data-column');

            // Alternar la visibilidad de la columna
            table.column(columnIdx).visible(!table.column(columnIdx).visible());
        });
    });
</script>
 <script>
=======
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
    function confirmarInhabilitar(id) {
        if (confirm("¿Estás seguro de que deseas inhabilitar este ambiente?")) {
            window.location.href = "inhabilitarAmbiente/" + id;
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
        }
=======
    });
>>>>>>> devJulian

    function confirmarHabilitar(id) {
        if (confirm("¿Está seguro de que desea habilitar este área de trabajo?")) {
            window.location.href = '/dashboard/gestion%20de%20ambientes/admin/habilitarAreaTrabajo/' + id;
        }
<<<<<<< HEAD
<<<<<<< HEAD
    </script>

=======
    }
</script>
<<<<<<< HEAD

=======
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
    <footer>
        <p>Sena todos los derechos reservados</p>
    </footer>
=======
    }

    function confirmarInhabilitar(id) {
        if (confirm("¿Está seguro de que desea inhabilitar este área de trabajo?")) {
            window.location.href = '/dashboard/gestion%20de%20ambientes/admin/inhabilitarAreaTrabajo/' + id;
        }
    }

</script>
>>>>>>> devJulian
</body>
<<<<<<< HEAD

</html>
=======
</html>
<<<<<<< HEAD

=======
>>>>>>> e3254bd64ca89f11e0378ba5f7d9babc9f142128
>>>>>>> f3e6f5f1e9317ed2b94983815a884a8a3c06bb06
