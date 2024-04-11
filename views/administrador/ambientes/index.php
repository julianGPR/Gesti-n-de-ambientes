<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Ambientes</title>
    <!-- Agrega enlaces a tus archivos CSS aquí -->
    <link rel="stylesheet" href="path/to/your/style.css">
</head>
<body>
    <div class="header">
        <h1>Gestión de Ambientes</h1>
        <img src="path/to/your/logo.png" alt="Logo de la empresa">
    </div>
    <div class="datetime">
        <p id="fecha"><?php echo date('d/m/Y'); ?></p>
        <p id="hora"><?php echo date('H:i'); ?></p>
    </div>
    <div class="subtitulo">
        <h2>Ambientes</h2>
    </div>
    <div class="descripcion">
        <p>Gestión de ambientes de formación</p>
    </div>
    <div class="filtro">
        <label for="filtro_ambiente">Buscar Ambiente:</label>
        <input type="text" id="filtro_ambiente" name="filtro_ambiente">
    </div>
    <div class="tabla-ambientes">
        <table border="1">
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
    // Conectar a la base de datos
    require_once 'config/db.php';
    $db = Database::connect();

    // Consulta SQL para seleccionar todos los registros de la tabla t_ambientes
    $query = "SELECT * FROM t_ambientes";
    $result = $db->query($query);

    // Comprobar si hay filas en el resultado
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
            echo "<button>Modificar</button>";
            echo "<button>Inhabilitar</button>";
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
        <?php
        // Construir la URL adecuada para el botón de "Gestión de Ambientes"
        $url_regresar= '/dashboard/gestion%20de%20ambientes/admin/home' ; // Corregir la construcción de la URL
        ?>
        <div class="regresar">
            <a href="<?php echo $url_regresar; ?>" class="button" id="btn-regresar">Regresar</a>
        </div>
        <div class="salir">
            <button id="btn_salir">Salir</button>
        </div>
    </div>
</body>
</html>
