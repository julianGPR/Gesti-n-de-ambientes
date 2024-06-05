<?php
    // Conectar a la base de datos
    require_once 'config/db.php';
    $db = Database::connect();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="../assets/Logo-Sena.jpg" alt="Logo de la empresa" class="logo">
        </div>
        <div class="title">
            <h1>Gestion de Ambientes de formacion</h1>
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
    <nav>
    <div class="column-toggle-buttons">
            <button class="toggle-vis" data-column="0">Tipo</button>
            <button class="toggle-vis" data-column="1">Marca</button>
            <button class="toggle-vis" data-column="2">Modelo</button>
            <button class="toggle-vis" data-column="3">Serial</button>
            <button class="toggle-vis" data-column="4">Placa de Inventario</button>
            <button class="toggle-vis" data-column="5">Id ambiente</button>
            <button class="toggle-vis" data-column="6">Hardware</button>
            <button class="toggle-vis" data-column="7">Software</button>
            <button class="toggle-vis" data-column="8">Acción</button>
        </div>
    </nav>
    <section class="ambiente" id="section-ambiente">
        <div class="subtitulo-ambiente">
            <h2>Administracion de Computadores</h2>
        </div>
        <div class="descripcion-ambiente">
            <p>Gestión de ambientes de formación</p>
        </div>
        <div class="tabla-ambientes tabla-scroll">
            <table class="table table-striped table-dark table_id" border="1" id="tabla-ambientes">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Serial</th>
                        <th>Placa de Inventario</th>
                        <th>Id ambiente</th>
                        <th>Hardware</th>
                        <th>Software</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta SQL base
                    $query = "SELECT c.Id_computador, c.Tipo, c.Marca, c.Modelo, c.Serial, c.PlacaInventario, a.Nombre,
                            CASE c.Hardware WHEN 1 THEN 'Funcional' ELSE 'No Funcional' END AS EstadoHardware,
                            CASE c.Software WHEN 1 THEN 'Funcional' ELSE 'No Funcional' END AS EstadoSoftware,
                            c.Observaciones
                            FROM t_computadores AS c
                            INNER JOIN t_ambientes AS a ON c.Id_ambiente = a.Id_ambiente";


                    if (!empty($filtros)) {
                        $query .= " WHERE " . implode(" AND ", $filtros);
                    }

                    // Ejecutar la consulta
                    $result = $db->query($query);

                    if ($result->num_rows > 0) {
                        // Iterar sobre los resultados y mostrar cada registro en una fila de la tabla HTML
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['Tipo'] . "</td>";
                            echo "<td>" . $row['Marca'] . "</td>";
                            echo "<td>" . $row['Modelo'] . "</td>";
                            echo "<td>" . $row['Serial'] . "</td>";
                            echo "<td>" . $row['PlacaInventario'] . "</td>";
                            echo "<td>" . $row['Nombre'] . "</td>";
                            echo "<td>" . $row['EstadoHardware'] . "</td>";
                            echo "<td>" . $row['EstadoSoftware'] . "</td>";
                            echo "<td>";
                            $url_update_c = '/dashboard/gestion%20de%20ambientes/admin/updateComputador/';
                            echo "<a href='" . $url_update_c . $row['Id_computador'] . "' class='boton-modificar'><img src='../assets/editar.svg'></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        // Si no hay filas en el resultado, mostrar un mensaje de que no hay registros
                        echo "<tr><td colspan='9'>No hay registros</td></tr>";
                    }

                    // Cerrar la conexión a la base de datos
                    $db->close();
                    ?>
                </tbody>
            </table>
        </div>
        <div class="filtro-y-crear">
            <div class="crear-ambiente">
                <?php
                // Construir la URL adecuada para el botón de "Gestión de Ambientes"
                $url_create = '/dashboard/gestion%20de%20ambientes/admin/createComputador/';
                ?>
                <ul>
                    <li><a href="<?php echo $url_create; ?>" id="btn-create">Crear Nuevo Computador</a></li>
                </ul>
            </div>
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
    <script>
        $(document).ready(function() {
            var table = $('#tabla-ambientes').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                paging: true,
                pageLength: 10 // Mostrar 10 registros por página
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
    <footer>
        <p>Sena todos los derechos reservados</p>
    </footer>
</body>
</html>
