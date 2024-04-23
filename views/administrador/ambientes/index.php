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
    <section class="ambiente" id="section-ambiente">
        <div class="subtitulo-ambiente">
            <h2>Ambientes</h2>
        </div>
        <div class="descripcion-ambiente">
            <p>Gestión de ambientes de formación</p>
        </div>
        <div class="tabla-ambientes tabla-scroll">
            <table border="1" >
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Computadores</th>
                        <th>TV</th>
                        <th>Sillas</th>
                        <th>Mesas</th>
                        <th>Tablero</th>
                        <th>Archivador</th>
                        <th>Infraestructura</th>
                        <th>Observación</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                <?php
// Consulta SQL para seleccionar todos los registros de la tabla t_ambientes
$query = "SELECT * FROM t_ambientes";
$result = $db->query($query);

if ($result->num_rows > 0) {
    // Iterar sobre los resultados y mostrar cada registro en una fila de la tabla HTML
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Id_ambiente'] . "</td>";
        echo "<td>" . $row['Nombre'] . "</td>";
        echo "<td>" . $row['Computadores'] . "</td>";
        echo "<td>" . $row['Tv'] . "</td>";
        echo "<td>" . $row['Sillas'] . "</td>";
        echo "<td>" . $row['Mesas'] . "</td>";
        echo "<td>" . $row['Tablero'] . "</td>";
        echo "<td>" . $row['Archivador'] . "</td>";
        echo "<td>" . $row['Infraestructura'] . "</td>";
        echo "<td>" . $row['Observacion'] . "</td>";
        echo "<td>";
        if ($row['Estado'] !== 'Inhabilitado') {
            $url_update = '/dashboard/gestion%20de%20ambientes/admin/updateAmbiente/';
            echo "<a href='" . $url_update . $row['Id_ambiente'] . "' class='boton-modificar'><img src='../assets/editar.svg'></a>";
<<<<<<< HEAD
=======
            $url_update = '/dashboard/gestion%20de%20ambientes/admin/generateQR/';
            echo "<a href='" . $url_update . $row['Id_ambiente'] . "' class='boton-generar-qr'>Generar QR</a>";
>>>>>>> origin/devjuan
        } else {
            // Si el ambiente está inhabilitado, mostrar el botón de habilitar
            echo "<a href='#' onclick='confirmarHabilitar(" . $row['Id_ambiente'] . ")' class='boton-habilitar boton-accion'><img src='../assets/habilitar.svg'></a>";
        }
        if ($row['Estado'] !== 'Inhabilitado') {
            echo "<a href='#' onclick='confirmarInhabilitar(" . $row['Id_ambiente'] . ")' class='boton-inhabilitar boton-accion'><img src='../assets/inhabilitar1.svg'></a>";
        }
        echo "</td>";
        echo "</tr>";
    }
} else {
    // Si no hay filas en el resultado, mostrar un mensaje de que no hay registros
    echo "<tr><td colspan='10'>No hay registros</td></tr>";
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
    <script>
    function confirmarInhabilitar(id) {
        if (confirm("¿Estás seguro de que deseas inhabilitar este ambiente?")) {
            window.location.href = "inhabilitarAmbiente/" + id;
        }
    }
    function confirmarHabilitar(id) {
        if (confirm("¿Estás seguro de que deseas habilitar este ambiente?")) {
            window.location.href = "habilitarAmbiente/" + id;
        }
    }
</script>
    <footer>
        <p>Sena todos los derechos reservados</p>
    </footer>
</body>
</html>
