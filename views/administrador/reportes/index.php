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
    </nav>
    <section class="ambiente" id="section-ambiente">
        <div class="subtitulo-ambiente">
            <h2>Ambientes</h2>
        </div>
        <div class="descripcion-ambiente">
            <p>Gestión de ambientes de formación</p>
        </div>
        <div class="tabla-ambientes tabla-scroll">
            <table class="table table-striped table-dark table_id" border="1" id="tabla-ambientes">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha y Hora</th>
                        <th>Id usuario</th>
                        <th>Id ambiente</th>
                        <th>Observaciones</th>
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
                        echo "<td>" . $row['Id_reporte'] . "</td>";
                        echo "<td>" . $row['FechaHora'] . "</td>";
                        echo "<td>" . $row['NombreCompleto'] . "</td>";
                        echo "<td>" . $row['ambiente'] . "</td>";
                        echo "<td>" . $row['Observaciones'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Si no hay filas en el resultado, mostrar un mensaje de que no hay registros
                    echo "<tr><td colspan='5'>No hay registros</td></tr>";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabla-ambientes').DataTable({
                "paging": true,
                "pageLength": 10 // Mostrar 10 registros por página
            });
        });
    </script>
</body>
</html>
