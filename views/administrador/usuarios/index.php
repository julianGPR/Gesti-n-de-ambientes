<?php
// Conectar a la base de datos
require_once 'config/db.php';
$db = Database::connect();
?>

<!DOCTYPE html>
<html>
<head>
    <title>USUARIOS</title>
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
                <label for="filtro_ambiente">Buscar Usuario:</label>
                <input type="text" id="filtro_ambiente" name="filtro_ambiente">
            </div>
            <div class="crear-ambiente">
                <ul>
                    <?php
                    // Construir la URL adecuada para el botón de "Gestión de Ambientes"
                    $url_create = '/dashboard/gestion%20de%20ambientes/admin/createUsuario/' ; // Corregir la construcción de la URL
                    ?>
                    <li><a href="<?php echo $url_create; ?>" id="btn-create">Crear Nuevo Usuario</a></li>
                </ul>
            </div>
        </div>
    </nav>  
    <section class="ambiente" id="section-ambiente">
        <div class="subtitulo-ambiente">
            <h2>Usuarios</h2>
        </div>
        <div class="descripcion-ambiente">
            <p>Gestión de Usuarios</p>
        </div>
        <div class="tabla-ambientes tabla-scroll">
            <table border="1" >
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Clave</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
    
    <?php

    // Consulta para obtener los datos
    $query = "SELECT id_usuario, Clave, Nombres, Apellidos, Correo FROM t_usuarios";
    $result = $db->query($query);

    // Mostrar los datos en la tabla
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_usuario"] . "</td>";
            echo "<td>" . $row["Nombres"] . "</td>";
            echo "<td>" . $row["Apellidos"] . "</td>";
            echo "<td>" . $row["Clave"] . "</td>";
            echo "<td>" . $row["Correo"] . "</td>";
            echo "<td>";
            $url_update = '/dashboard/gestion%20de%20ambientes/admin/updateUsuario/';
            echo "<a href='" . $url_update . $row['id_usuario'] . "' class=''><img src='../assets/editar.svg'></a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>0 resultados</td></tr>";
    }
    $db->close();
    ?>
                </tbody>
            </table>
        <div class="regresar">
            <?php
                $url_regresar = 'usuarios';
            ?>
            <a href="<?php echo $url_regresar; ?>" class="button boton-centrado" id="btn-regresar">Regresar</a>
        </div>
        <div class="salir">
            <button id="btn_salir">Salir</button>
        </div>
    </section>
    </div>
    <footer>
        <p>Sena todos los derechos reservados</p>
    </footer>
</body>
</html>